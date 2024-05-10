<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use App\Http\Requests\StoreFakturRequest;
use App\Http\Requests\UpdateFakturRequest;
use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;

class FakturController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function create(Request $request, $id)
    {
        $barang = Barang::find($id);
        return view('addOrder', compact('barang'));
    }

    public function show(){
        $faktur = Faktur::all();
        $faktur = $faktur->reverse();

        return view('viewOrder', compact('faktur'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $barang = Barang::find($id);

        $request->validate([
            'kuantitas'=>'required|numeric|min:1|lte:'.$barang->jumlah,
            'alamatPengiriman'=>'required|min:10|max:100',
            'kodePos'=>'required|digits:5',
        ]);

        $total = $request->kuantitas * $barang->harga;
        $userId = auth()->user()->id;
        
        Faktur::create([
            'idBarang'=>$barang->id,
            'idUser'=>$userId,
            'namaBarang'=>$barang->nama,
            'fotoBarang'=>$barang->foto,
            'hargaBarang'=>$barang->harga,
            'categoryBarang'=>$barang->category->nama ?? "Uncategorized",
            'kuantitas'=>$request->kuantitas,
            'alamatPengiriman'=>$request->alamatPengiriman,
            'kodePos'=>$request->kodePos,
            'total'=>$total
        ]);
        
        $barang->jumlah = $barang->jumlah - $request->kuantitas;
        $barang->save();

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faktur $faktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFakturRequest $request, Faktur $faktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faktur $faktur)
    {
        //
    }
}
