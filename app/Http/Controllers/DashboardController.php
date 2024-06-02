<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $props = [
            'title' => 'Dashboard',
        ];
        return view('admin.dashboard', $props);
    }
}
