<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Mengambil informasi pengguna yang saat ini login

        return view('welcome', ['user' => $user]);
    }
}
