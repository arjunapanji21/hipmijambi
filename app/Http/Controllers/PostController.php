<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $props = [
            'title' => 'Articles',
            'posts' => Post::orderBy('created_at', 'asc')->paginate(10),
        ];
        return view('admin.post.index', $props);
    }
    public function create()
    {
        $props = [
            'title' => 'New Article',
            'categories' => PostCategory::orderBy('name', 'asc')->get(),
        ];
        return view('admin.post.create', $props);
    }
    public function create_draft(Request $request)
    {
        $data = $request->all();
        $data['author_id'] = auth()->user()->id;
        $data['status'] = "Draft";
        Post::create($data);
        return response()->json([
            'status' => 200,
            'msg' => 'Post has been saved to draft.',
        ]);
    }
    public function create_publish(Request $request)
    {
        $data = $request->all();
        $data['author_id'] = auth()->user()->id;
        $data['status'] = "Publish";
        Post::create($data);
        return response()->json([
            'status' => 200,
            'msg' => 'Post has been saved to publish.',
        ]);
    }
}
