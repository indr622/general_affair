<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;

class VendorController extends Controller
{

    public function index()
    {
        $vendors = Vendor::all();
        return view('vendors.index', compact('vendors'));
    }


    public function create()
    {
        return view('vendors.create');
    }

    public function store(StoreVendorRequest $request)
    {
        Vendor::create($request->validated());
        return redirect()->route('penyedia.index')->withSuccess('Vendor Berhasil Disimpan.');
    }

    public function edit($id)
    {
        $vendors = Vendor::findOrFail($id);

        return view('vendors.edit', compact('vendors'));
    }


    public function update(UpdateVendorRequest $request, $id)
    {
        $vendors = Vendor::findOrFail($id);
        $vendors->update($request->validated());
        return redirect()->route('penyedia.index')->withSuccess('Vendor Berhasil Diupdate.');
    }
}
