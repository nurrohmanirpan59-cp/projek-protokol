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

    // Menampilkan Seluruh Data Divisi 
    public function create()
    {
        {
        return view('divisi.create');
    }
    }

    // function buat menambahkan data kedalam database
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_divisi' => 'required|string|max:255',
        ]);

        Divisis::create([
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
     * FUNCTION BUAT EDIT DATA 
     */
    // 4. Form edit divisi
    public function edit(divisis $divisi)
    {
        return view('divisi.edit', compact('divisi'));
    }

    // 5. Update divisi
    public function update(Request $request, divisis $divisi)
    {
        $request->validate([
            'nama_divisi' => 'required|string|max:255',
        ]);

        $divisi->update([
            'nama_divisi' => $request->nama_divisi,
        ]);

        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil diperbarui!');
    }
    

    // funnction buat menghapus data 
    public function destroy(string $id)
    
        {
    // 1. Cari data di database berdasarkan $id
    // Catatan: Ganti 'Divisi' dengan nama class Model kamu jika berbeda
    $divisi = Divisis::findOrFail($id);

    // 2. Jalankan perintah hapus
    $divisi->delete();

    // 3. Kembalikan user ke halaman index dengan pesan sukses
    return redirect()->route('divisi.index')->with('success', 'Data divisi berhasil dihapus!');
        }

        //Fitur Pencarian Realtime 
        public function search(Request $request)
    {
        // Tangkap keyword dari input
        $search = $request->input('search');

        // Ambil data divisi berdasarkan pencarian
        $divisi = Divisi::when($search, function ($query, $search) {
            return $query->where('nama_divisi', 'like', "%{$search}%");
        })->get();

        // Kirim data ke view
        return view('divisi.index', compact('divisi'));
    }
    
}
