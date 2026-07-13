<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilik;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminModel;
use App\Models\PelangganModel;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Login'); // Pastikan nama view sesuai
    }

   public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;
        
        // PERBAIKAN 1: Tambahkan strtolower() agar domain selalu huruf kecil
        $domain = strtolower(explode('@', $email)[1] ?? '');

        $user = null;
        $role = '';
        $redirectUrl = '';

        if ($domain === 'pemilikboslaptop.com') {
            $user = Pemilik::where('email', $email)->first();
            $role = 'pemilik';
            $redirectUrl = '/produkpemilik'; 
        } 
        elseif ($domain === 'adminboslaptop.com') {
            $user = AdminModel::where('email', $email)->first();
            $role = 'admin';
            $redirectUrl = '/produkadmin'; 
        } 
        else {
            $user = PelangganModel::where('email', $email)->first();
            $role = 'pelanggan';
            $redirectUrl = '/produkpelanggan'; 
        }

        // PERBAIKAN 2: Pengecekan Hash Password & Teks Biasa
        $passwordCocok = false;
        
        if ($user) {
            if ($role === 'admin' || $role === 'pelanggan') {
                // Khusus Admin: Gunakan Hash::check karena di database sudah Bcrypt
                if (Hash::check($password, $user->password)) {
                    $passwordCocok = true;
                }
            } else {
                // Untuk Pemilik pengecekan teks biasa (plain text)
                if ($user->password === $password) {
                    $passwordCocok = true;
                }
            }
        }

        if ($passwordCocok) { 
            Session::put('logged_in', true);
            Session::put('user_role', $role);
            Session::put('user_id', $user->{"id_$role"});
            Session::put('user_name', $user->nama);
            Session::put('foto_profil', $user->foto_profil ?? null);

            return redirect($redirectUrl);
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->withInput($request->except('password'));
    }

    public function logout()
    {
        Session::flush(); // Hapus semua session
        return redirect('/login');
    }
}