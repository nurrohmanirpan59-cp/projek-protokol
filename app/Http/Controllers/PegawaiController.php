<?php

namespace App\Http\Controllers;
use App\Models\pegawais;
use App\Models\divisis;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
         // 2. AMBIL DATA DARI DATABASE
        
        $data_pegawai = pegawais::with('divisi')->paginate(10);
        return view('pegawai.index', compact('data_pegawai'));
    }
    }

    /**
     * function untuk menambahkan data ke dalam database
     */
    public function create()
    {
        //ambil data divisi dari database biar form ada dropdown divisi 
        $divisis = divisis::all(); 
        return view('pegawai.create', compact('divisis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'nama' => 'required|string|max:255',
            'divisi_id' => 'required',
            // tambahkan field lainnya sesuai kebutuhan
        ]);

        // Simpan ke database
        Pegawai::create($request->all());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
