<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Tidak perlu ambil data, cukup return view
        return view('homepage');
    }
}
