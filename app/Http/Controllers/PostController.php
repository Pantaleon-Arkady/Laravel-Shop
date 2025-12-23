<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GeneralController;
use App\Models\Post;

class PostController extends Controller
{
    public function deletePost(Post $post)
    {
        if (Auth::id() === $post['user_id']) {
            $post->delete();
            return redirect('/');
        }
        return "<h1>NO ACCESS</h1>";
    }

    public function updatePost(Post $post, Request $request)
    {
        if (Auth::id() !== $post['user_id']) {
            return "<h1>NO ACCESS</h1>";
        }

        $dataInput = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $dataInput['title'] = strip_tags($dataInput['title']);
        $dataInput['content'] = strip_tags($dataInput['content']);

        $post->update([
            'title' => $dataInput['title'],
            'content' => $dataInput['content']
        ]);

        return redirect('/');
    }

    public function editPost(Post $post)
    {
        if (Auth::id() !== $post['user_id']) {
            return "<h1>NO ACCESS</h1>";
        }

        return view('edit-post', ['post' => $post]);
    }

    public function createPost(Request $request)
    {
        $dataInput = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $dataInput['title'] = strip_tags($dataInput['title']);
        $dataInput['content'] = strip_tags($dataInput['content']);
        $dataInput['user_id'] = Auth::id();

        Post::create([
            'title' => $dataInput['title'],
            'content' => $dataInput['content'],
            'user_id' => $dataInput['user_id']
        ]);

        return redirect('/');
    }
}
