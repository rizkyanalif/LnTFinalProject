<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Illuminate\Http\Request;
use PDO;

class BarangController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        $barang = Barang::all();
        $barang = $barang->reverse();

        return view('dashboard', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $category = Category::all();

        return view('addBarang', compact('barang', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5| max:80',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'foto' => 'required',
            'CategoryId' => 'required'
        ]);

        $filename = NULL;

        $extension = $request->file('foto')->getClientOriginalExtension();
        $originalName = pathinfo($request->file('foto')->getClientOriginalName(), PATHINFO_FILENAME);

        $filename = $originalName.'_' .$extension;
        $request->file('foto')->storeAs('/public/images', $filename);

        Barang::create([
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'jumlah'=>$request->jumlah,
            'foto'=>$filename,
            'CategoryId'=>$request->CategoryId
        ]);

        return redirect('/')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::findorFail($id);
        $category = Category::all();
        return view('editBarang', compact('barang', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:5| max:80',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'foto',
            'CategoryId' => 'required'
        ]);

        if(!$request->file('foto')){
            $filename = Barang::findorFail($id)->foto;
        }else{
            $filename = NULL;
            
            $extension = $request->file('foto')->getClientOriginalExtension();
            $originalName = pathinfo($request->file('foto')->getClientOriginalName(), PATHINFO_FILENAME);
            
            $filename = $originalName.'_' .$extension;
            $request->file('foto')->storeAs('/public/images', $filename);
        }

        Barang::findorFail($id)->update([
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'jumlah'=>$request->jumlah,
            'foto'=>$filename,
            'CategoryId'=>$request->CategoryId
        ]);

        return redirect('/')->with('success', 'Barang berhasil diedit');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Barang::Destroy($id);
        return redirect('/')->with('deleted', 'Barang berhasil dihapus');
    }
}
