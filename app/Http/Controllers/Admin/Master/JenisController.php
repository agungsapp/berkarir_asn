<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\JenisUjian;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'jenis' => JenisUjian::all()
        ];

        return view('admin.master.jenis.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|unique:jenis_ujians,nama'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.string' => 'Nama harus berupa huruf',
            'nama.unique' => 'Jenis ujian ini sudah ada',
        ]);
        try {
            JenisUjian::create($validated);
            sweetalert()->success('Berhasil disimpan.');
            return redirect()->back();
        } catch (\Throwable $th) {
            sweetalert()->error('Terjadi kesalahan saat menyimpan data.');
            return redirect()->back()->withInput();
        }
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
    public function edit(JenisUjian $jenisUjian)
    {

        return view('admin.master.jenis.edit', compact('jenisUjian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisUjian $jenisUjian)
    {
        $request->validate([
            'nama' => 'required|string|unique:jenis_ujians,nama,' . $jenisUjian->id
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.unique'   => 'Jenis ujian sudah ada',
        ]);

        $jenisUjian->update($request->only('nama'));
        sweetalert()->success('Berhasil diperbarui.');

        return redirect()->route('admin.master.jenis-ujian.index');
    }

    public function destroy(JenisUjian $jenisUjian)
    {
        $jenisUjian->delete();
        sweetalert()->success('Berhasil dihapus.');

        return redirect()->back();
    }
}
