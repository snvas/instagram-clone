<?php

namespace App\Http\Controllers;
use App\Http\Resources\AllPostsCollection;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
		$posts = Post::orderBy('created_at', 'desc')->get();
		return Inertia::render('Home', [
			'posts' => new AllPostsCollection($posts),
			'allUsers' => User::all()
		]);
	}
}
