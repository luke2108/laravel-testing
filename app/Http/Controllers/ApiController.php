<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function helloWorld()
    {
        $result = Post::select(
            'posts.title',
            'posts.content',
            'posts.category',
            'posts.image',
            'posts.user_id',
            'posts.id',
            'users.id as user_id',
            'users.name',
            'users.email',
            'posts.created_at',
            'posts.updated_at'
        )
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->get();
    
        return response()->json(['data' => $result]);
    }
}