<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin'); // Pastikan view ini ada
    }

    public function kasir()
    {
        return view('dashboard.kasir'); // Pastikan view ini ada
    }

    public function supervisor()
    {
        return view('dashboard.supervisor'); // Pastikan view ini ada
    }

    public function manajer()
    {
        return view('dashboard.manajer'); // Pastikan view ini ada
    }

    public function gudang()
    {
        return view('dashboard.gudang'); // Pastikan view ini ada
    }
}
