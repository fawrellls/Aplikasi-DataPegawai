<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    public function index()
    {
        return view('pengaturan.index');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // ✅ Jika user mengisi password baru
        if ($request->filled('password')) {
            // Cek apakah password baru sama dengan yang lama
            if (Hash::check($request->password, $user->password)) {
                return back()->withErrors(['password' => 'Gunakan password lain, tidak boleh sama dengan password sebelumnya!']);
            }

            // Update password baru jika berbeda
            $user->password = Hash::make($request->password);
        }

        // Update field lain seperti biasa
        $user->name = $request->name;
        $user->username = $request->username;
        $user->save();

        return back()->with('success', 'Pengaturan akun berhasil diperbarui!');
    }
}
