<?php

namespace App\Http\Controllers;

use App\Models\PasienModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PasienController extends Controller
{
    public function index(): view
    {
        $data['pasien'] = PasienModel::orderBy('id', 'desc')->paginate(5);
        return view('pasien.index', $data);
    }


    public function create(): view
    {
        return view('pasien.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'noreg' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tgl_lahir' => 'required',
        ]);

        $pasien = new PasienModel;
        $pasien->noreg = $request->noreg;
        $pasien->nama = $request->nama;
        $pasien->jk = $request->jk;
        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->save();
        return redirect()->route('pasien.index')
            ->with('success', 'pasien has been created successfully.');
    }


    public function show(PasienModel $pasien): view
    {
        return view('pasien.show', compact('pasien'));
    }


    public function edit(PasienModel $pasien): view
    {
        return view('pasien.edit', compact('pasien'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'noreg' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tgl_lahir' => 'required',
        ]);

        $pasien = PasienModel::find($id);
        $pasien->noreg = $request->noreg;
        $pasien->nama = $request->nama;
        $pasien->jk = $request->jk;
        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->save();

        return redirect()->route('pasien.index')
            ->with('success', 'pasien Has Been updated successfully');
    }


    public function destroy(PasienModel $pasien): RedirectResponse
    {
        $pasien->delete();
        return redirect()->route('pasien.index')
            ->with('success', 'pasien has been deleted successfully');
    }
}