<?php

namespace App\Http\Controllers;
use App\Models\Divisis;

use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * // 1. Tampilkan daftar divisi
     */
    public function index()
    {
        {
         // 2. AMBIL DATA DARI DATABASE
        // Eloquent 'all()' akan menjalankan query: SELECT * FROM divises;
        $divisis = Divisis::latest()->paginate(10);
        return view('divisi.index', compact('divisis'));
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
        return view('divisi.create');
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_divisi' => 'required|string|max:255',
        ]);

        Divisi::create([
            'nama_divisi' => $request->nama_divisi,
        ]);

        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // 4. Form edit divisi
    public function edit(Divisi $divisi)
    {
        return view('divisi.edit', compact('divisi'));
    }

    // 5. Update divisi
    public function update(Request $request, Divisi $divisi)
    {
        $request->validate([
            'nama_divisi' => 'required|string|max:255',
        ]);

        $divisi->update([
            'nama_divisi' => $request->nama_divisi,
        ]);

        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil diperbarui!');
    }
    

    /**
     * Update the specified resource in storage.
     */
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
        // 1. Jalankan perintah hapus data via Eloquent
        $divisi->delete();

        // 2. Kembalikan user ke halaman index dengan pesan sukses
        return redirect()->route('divisi.index')->with('success', 'Data divisi berhasil dihapus!');
    }
    }
}
