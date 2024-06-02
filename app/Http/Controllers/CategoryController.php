<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::orderBy('created_at', 'asc')->paginate(10);
        $props = [
            'title' => 'Category',
            'categories' => $categories,
        ];
        return view('admin.category.index', $props);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        PostCategory::create($data);
        return back()->with('success', 'A new category has been added to database.');
    }
    public function update(Request $request, $id)
    {
        $request->all();
        return back()->with('success', 'Category updated successfully.');
    }
}
