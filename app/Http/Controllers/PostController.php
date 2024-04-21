<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\FileService;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post;
		$request->validate([
			'file' => 'required|mimes:jpg,jpeg,png',
			'text' => 'required'
		]);
		$post = (new FileService)->updateFile($post, $request, 'post');
		$post->user->id = auth()->user()->id;
		$post->text = $request->input('text');
		$post->save();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = Post::find($id);
		if(!empty($post->file)){
			$currentFile = public_path() . $post->file;
			if(file_exists($currentFile)) {
				unlink($currentFile);
			}
		}
		$post->delete();
    }
}
