<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $posts = Post::all();
        } else {
            $posts = Post::where(['public' => true]);
        }
        return view('index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(PostRequest $request)
    {
        $data = $request->all();
        $user = Auth::user();
        if (!$user) {
            return view('index');
        }
        $post = Post::create([
            'name' => $data['name'],
            'text' => $data['text'],
            'user_id' => $user->id
        ]);
        if ($post) {
            return redirect()->route('listPosts');
        }
        return redirect()->route('сreatePost');

    }

    public function update($id, PostRequest $request)
    {
        $data = $request->all();
        $post = Post::where(['id' => $id])
            ->update([
                'name' => $data['name'],
                'text' => $data['text']
            ]);
        if ($post) {
            return redirect()->route('listPosts');
        }
        return redirect()->route('editPost', ['id' => $id]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', ['post' => $post]);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('listPosts');
    }
}
