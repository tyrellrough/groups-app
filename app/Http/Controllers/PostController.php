<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;

class PostController extends Controller
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
            'pageID' => 'required',
        ]);
        $newPost = new Post;
        $newPost->text = $validatedData["text"];
        $newPost->page_id = $validatedData["pageID"];
        $newPost->image = "placeHolderImage";
        $newPost->user_id = auth()->user()->id;
        $newPost ->save();
        session()->flash('message', "Post was created.");
        return redirect()->route('groups.show',['id' => $request->groupID]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        //dd($post);
        $user = auth()->user();
        return view('posts.show', ['post' => $post, 'currentUser' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $currentUser = auth()->user();
        $post = Post::findOrFail($id);
        if(!($currentUser->id == $post->user_id)) {
            return redirect()->back();
        }
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, )
    {
        $validatedData = $request->validate([
            'text' => 'required|max:1000',
        ]);
        $post = Post::findOrFail($id);
        $currentUser = auth()->user();
        if(!($currentUser->id == $post->user_id)) {
            return redirect()->back();
        }
        $post->text = $validatedData['text'];
        $post->save();
        return redirect()->route('user.show',['id' => $currentUser->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $currentUser = auth()->user();
        $post = Post::findOrFail($id);
        if(!($currentUser->id == $post->user_id)) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('user.show',['id' => $currentUser->id]);
    }
}
