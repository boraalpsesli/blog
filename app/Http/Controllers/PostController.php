<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file_name = $request->file('image')->store('images', 'public');

        Post::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $file_name,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
