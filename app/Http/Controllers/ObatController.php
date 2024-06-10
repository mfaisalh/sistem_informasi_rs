<?php

namespace App\Http\Controllers;

use App\Models\ObatModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ObatController extends Controller
{
    public function index(): view
    {
        $data['obat'] = ObatModel::orderBy('id', 'desc')->paginate(5);
        return view('obat.index', $data);
    }


    public function create(): view
    {
        return view('obat.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'bentuk' => 'required',
            'berat' => 'required',
            'kemasan' => 'required',
        ]);

        $obat = new ObatModel;
        $obat->kode_obat = $request->kode_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->bentuk = $request->bentuk;
        $obat->berat = $request->berat;
        $obat->kemasan = $request->kemasan;
        $obat->save();
        return redirect()->route('obat.index')
            ->with('success', 'obat has been created successfully.');
    }


    public function show(ObatModel $obat): view
    {
        return view('obat.show', compact('obat'));
    }


    public function edit(ObatModel $obat): view
    {
        return view('obat.edit', compact('obat'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'bentuk' => 'required',
            'berat' => 'required',
            'kemasan' => 'required',
        ]);

        $obat = ObatModel::find($id);
        $obat->kode_obat = $request->kode_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->bentuk = $request->bentuk;
        $obat->berat = $request->berat;
        $obat->kemasan = $request->kemasan;
        $obat->save();

        return redirect()->route('obat.index')
            ->with('success', 'obat Has Been updated successfully');
    }


    public function destroy(ObatModel $obat): RedirectResponse
    {
        $obat->delete();
        return redirect()->route('obat.index')
            ->with('success', 'obat has been deleted successfully');
    }
}

