<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\TipeUjian;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function index()
    {
        return view('admin.master.tipe.index', [
            'tipe' => TipeUjian::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|unique:tipe_ujians,nama'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.unique'   => 'Tipe ujian sudah ada',
        ]);

        TipeUjian::create($request->only('nama'));
        sweetalert()->success('Berhasil disimpan.');

        return redirect()->back();
    }

    public function edit(TipeUjian $tipeUjian)
    {
        return view('admin.master.tipe.edit', compact('tipeUjian'));
    }

    public function update(Request $request, TipeUjian $tipeUjian)
    {
        $request->validate([
            'nama' => 'required|string|unique:tipe_ujians,nama,' . $tipeUjian->id
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.unique'   => 'Tipe ujian sudah ada',
        ]);

        $tipeUjian->update($request->only('nama'));
        sweetalert()->success('Berhasil diperbarui.');

        return redirect()->route('admin.master.tipe-ujian.index');
    }

    public function destroy(TipeUjian $tipeUjian)
    {
        $tipeUjian->delete();
        sweetalert()->success('Berhasil dihapus.');

        return redirect()->back();
    }
}
