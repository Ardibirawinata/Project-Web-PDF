<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class JpgtopdfController extends Controller
{
    /**
     
     */
    public function showDashboard(): View
    {
        $user = Auth::user(); // Ambil database kolom user 

        return view('dashboard.jpgtopdf.index', ['user' => $user]);
    }
}
