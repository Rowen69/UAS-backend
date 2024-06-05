<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baju;

class BajuController extends Controller
{

    public function create()
    {
        return view('admin.createBaju');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'image' => 'required|image',
            'harga' => 'required|numeric',
            'deskripsi' => 'required'
        ]);

        $imageName = time().'.'.$request->file('image')->extension();  
        $request->file('image')->move(public_path('images'), $imageName);

        $baju = new Baju();
        $baju->nama = $request->nama;
        $baju->gambar = $imageName;
        $baju->harga = $request->harga;
        $baju->deskripsi = $request->deskripsi;
        $baju->save();

        return redirect()->route('manage.items')->with('success', 'Baju has been added successfully.');
    }
}
