<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RotateController extends Controller
{
    /**
     
     */
    
    public function showDashboard(): View
    {
        $user = Auth::user(); // Ambil database kolom user 

        return view('prouser.rotate', ['user' => $user]);
    }


    
}
