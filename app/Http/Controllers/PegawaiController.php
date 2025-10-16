<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Departemen;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Tampilkan semua data pegawai
     */
    public function index()
    {
        $pegawais = Pegawai::with(['jabatan', 'departemen'])->get();
        return view('pegawai.index', compact('pegawais'));
    }

    /**
     * Tampilkan form tambah pegawai baru
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        $departemens = Departemen::all();
        return view('pegawai.create', compact('jabatans', 'departemens'));
    }

    /**
     * Simpan data pegawai baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jabatan_id' => 'required|exists:jabatan,id',
            'departemen_id' => 'required|exists:departemen,id',
        ]);

        $fotoName = null;
        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/foto'), $fotoName);
        }

        Pegawai::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'foto' => $fotoName,
            'jabatan_id' => $request->jabatan_id,
            'departemen_id' => $request->departemen_id,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail pegawai (opsional)
     */
    public function show($id)
    {
        $pegawai = Pegawai::with(['jabatan', 'departemen'])->findOrFail($id);
        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * Tampilkan form edit pegawai
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $jabatans = Jabatan::all();
        $departemens = Departemen::all();

        return view('pegawai.edit', compact('pegawai', 'jabatans', 'departemens'));
    }

    /**
     * Proses update data pegawai
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jabatan_id' => 'required|exists:jabatan,id',
            'departemen_id' => 'required|exists:departemen,id',
        ]);

        // Update foto jika ada file baru
        if ($request->hasFile('foto')) {
            if ($pegawai->foto && file_exists(public_path('uploads/foto/' . $pegawai->foto))) {
                unlink(public_path('uploads/foto/' . $pegawai->foto));
            }

            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/foto'), $fotoName);
            $pegawai->foto = $fotoName;
        }

        $pegawai->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'jabatan_id' => $request->jabatan_id,
            'departemen_id' => $request->departemen_id,
        ]);

        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }

    /**
     * Hapus data pegawai
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        // Hapus foto dari folder jika ada
        if ($pegawai->foto && file_exists(public_path('uploads/foto/' . $pegawai->foto))) {
            unlink(public_path('uploads/foto/' . $pegawai->foto));
        }

        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }
}
