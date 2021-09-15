<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function check(){
        return Auth::check() ? view('admin.home') : $this->getGuestHome(); 
    }


    public function getGuestHome(){

        $lastPosts = Post::orderBy('date', 'DESC')->take(5)->get();
        $allPosts = Post::paginate(5);

        return view('guest.home', compact('lastPosts', 'allPosts'));
    }
}
