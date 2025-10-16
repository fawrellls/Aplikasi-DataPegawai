<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Tampilkan semua data departemen.
     */
    public function index()
    {
        $departemen = Departemen::withCount('pegawai')->get();
        return view('departemen.index', compact('departemen'));
    }

    /**
     * Tampilkan form tambah departemen.
     */
    public function create()
    {
        return view('departemen.create');
    }

    /**
     * Simpan data departemen baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_departemen' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',
        ]);

        Departemen::create($validated);

        return redirect()
            ->route('departemen.index')
            ->with('success', '✅ Departemen berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit departemen.
     */
    public function edit($id)
    {
        $departemen = Departemen::findOrFail($id);
        return view('departemen.edit', compact('departemen'));
    }

    /**
     * Update data departemen.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_departemen' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',
        ]);

        $departemen = Departemen::findOrFail($id);
        $departemen->update($validated);

        return redirect()
            ->route('departemen.index')
            ->with('success', '📝 Departemen berhasil diperbarui!');
    }

    /**
     * Hapus data departemen.
     */
    public function destroy($id)
    {
        $departemen = Departemen::findOrFail($id);
        $departemen->delete();

        return redirect()
            ->route('departemen.index')
            ->with('success', '🗑️ Departemen berhasil dihapus!');
    }
}
