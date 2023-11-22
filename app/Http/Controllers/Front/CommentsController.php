<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index($post)
    {

    }

    public function store(Request $request)
    {

        $comment = Comment::create($request->all());
        if ($comment) {
            return redirect()->back();
        }
    }
}
