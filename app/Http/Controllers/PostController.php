<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.index', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function post(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'image'],
            'title' => ['required', 'min:10', 'max:50'],
            'description' => ['required', 'min:10', 'max:10000'],
        ]);

        $path = null;
        if ($request->has('image')) {
            $path = $request->file('image')->store('posts', ['disk' => 'public']);
        }

        Post::create([
            'image' => $path,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard')->with('success', true);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return view('post.update', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'image'],
            'title' => ['required', 'min:10', 'max:50'],
            'description' => ['required', 'min:10', 'max:10000'],
        ]);

        $path = null;
        if ($request->has('image')) {
            $path = $request->file('image')->store('posts', ['disk' => 'public']);
        }

        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->update([
            'image' => $path,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard')->with('success', true);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return redirect()->route('dashboard')->with('success', true);
    }
}
