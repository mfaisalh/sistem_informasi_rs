<?php

namespace App\Http\Controllers;

use App\Models\DokterModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DokterController extends Controller
{
    public function index(): view
    {
        $data['dokter'] = DokterModel::orderBy('id', 'desc')->paginate(5);
        return view('dokter.index', $data);
    }


    public function create(): view
    {
        return view('dokter.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'spesialis' => 'required',
            'tempat_praktek' => 'required',
        ]);

        $dokter = new DokterModel;
        $dokter->nip = $request->nip;
        $dokter->nama = $request->nama;
        $dokter->jk = $request->jk;
        $dokter->spesialis = $request->spesialis;
        $dokter->tempat_praktek = $request->tempat_praktek;
        $dokter->save();
        return redirect()->route('dokter.index')
            ->with('success', 'dokter has been created successfully.');
    }


    public function show(DokterModel $dokter): view
    {
        return view('dokter.show', compact('dokter'));
    }


    public function edit(DokterModel $dokter): view
    {
        return view('dokter.edit', compact('dokter'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'spesialis' => 'required',
            'tempat_praktek' => 'required',
        ]);

        $dokter = DokterModel::find($id);
        $dokter->nip = $request->nip;
        $dokter->nama = $request->nama;
        $dokter->jk = $request->jk;
        $dokter->spesialis = $request->spesialis;
        $dokter->tempat_praktek = $request->tempat_praktek;
        $dokter->save();

        return redirect()->route('dokter.index')
            ->with('success', 'dokter Has Been updated successfully');
    }


    public function destroy(DokterModel $dokter): RedirectResponse
    {
        $dokter->delete();
        return redirect()->route('dokter.index')
            ->with('success', 'dokter has been deleted successfully');
    }
}