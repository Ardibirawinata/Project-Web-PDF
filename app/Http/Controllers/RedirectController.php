<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        $role_id = auth()->user()->role_id;

        if ($role_id === 1) {
            return redirect('/user');
        } elseif ($role_id === 2) {
            return redirect('/dashboard');
        } elseif ($role_id === 3) {
            return redirect('/dashboard');
        } else {
            // Jika role_id tidak sesuai dengan yang diharapkan,
            // atur pengalihan default atau berikan pesan kesalahan.
            return redirect('/');
        }
    }
}
