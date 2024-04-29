<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('admin.posts.index');
    }
    public function create(){
        return view('admin.posts.create');
    }
    public function create_draft(Request $request){
        return redirect(route('admin.posts.index'))->with('success', "Post has been saved in draft");
    }
    public function create_publish(Request $request){
        dd($request->all());
        return redirect(route('admin.posts.index'))->with('success', "Post has been successfully published");
    }
}
