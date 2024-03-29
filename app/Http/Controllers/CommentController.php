<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentEmail;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:1000',
            'postID' => 'required',
        ]);
        $newComment = new Comment;
        $newComment->text = $validatedData["text"];
        $newComment->post_id = $validatedData["postID"];
        $newComment->user_id = auth()->user()->id;
        $newComment ->save();
        session()->flash('message', "Comment was created.");
    
        //email (notify post creator of comment)
        $currentUsername = auth()->user()->name;
        $post = Post::findOrFail($validatedData["postID"]);
        $user = User::findOrFail($post->user_id);
        $recipientEmail = $user->email; 

        Mail::to($recipientEmail)->send(new CommentEmail($currentUsername, $post->text, $newComment->text));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:1000',
        ]);
        $comment = Comment::findOrFail($id);
        $currentUser = auth()->user();
        if(!($currentUser->id == $comment->user_id)) {
            return redirect()->back();
        }
        $comment->text = $validatedData['text'];
        $comment->save();
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $currentUser = auth()->user();
        $comment = Comment::findOrFail($id);
        if(!($currentUser->id == $comment->user_id) and ($currentUser->isAdmin === 0)) {
            return redirect()->back();
        }
        $comment->delete();
        return redirect()->route('user.show',['id' => $currentUser->id]);
        //return redirect()->back()->withInput();
    }
}
