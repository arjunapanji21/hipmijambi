<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $props = [
            'title' => 'All Users',
            'users' => User::orderBy('role', 'asc')->paginate(10),
        ];
        return view('admin.user.index', $props);
    }
    public function trash()
    {
        $props = [
            'title' => 'Deleted Users',
            'users' => User::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10),
        ];
        return view('admin.user.trash', $props);
    }
}
