<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CommentReceived;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Team;

class CommentController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function store(Team $team, CommentRequest $request)
    {
        $data = $request->validated();
        $comment = new Comment($data);
        $comment->team()->associate($team);
        $comment->user()->associate(auth()->user());
        Mail::to($team)->send(new CommentReceived($comment));
        $comment->save();
        return back();
    }
}
