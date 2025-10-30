<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataPesertaController extends Controller
{
    public function index()
    {
        $peserta = User::where('role', 'peserta')->get();
        return view('admin.master.data-peserta.index', compact('peserta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required'     => 'Nama wajib diisi',
            'email.required'    => 'Email wajib diisi',
            'email.unique'      => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'peserta',
        ]);

        sweetalert()->success('Peserta berhasil ditambahkan.');

        return redirect()->back();
    }

    public function show(User $dataPeserta)
    {
        // return response()->json($dataPeserta);
        if ($dataPeserta->role != 'peserta') {
            abort(404);
        }
        return view('admin.master.data-peserta.show', compact('dataPeserta'));
    }

    public function edit(User $dataPeserta)
    {
        if ($dataPeserta->role !== 'peserta') {
            abort(404);
        }
        return view('admin.master.data-peserta.edit', compact('dataPeserta'));
    }

    public function update(Request $request, User $dataPeserta)
    {
        if ($dataPeserta->role !== 'peserta') {
            abort(404);
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $dataPeserta->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $dataPeserta->update($data);
        sweetalert()->success('Peserta berhasil diperbarui.');

        return redirect()->route('admin.master.data-peserta.index');
    }

    public function destroy(User $dataPeserta)
    {
        if ($dataPeserta->role !== 'peserta') {
            abort(404);
        }

        $dataPeserta->delete();
        sweetalert()->success('Peserta berhasil dihapus.');

        return redirect()->back();
    }
}
