<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

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
        //dd($request["image"]);

        $validatedData = $request->validate([
            'text' => 'required|max:1000',
            'pageID' => 'required',
        ]);

        $newPost = new Post;
        $newPost->text = $validatedData["text"];
        $newPost->page_id = $validatedData["pageID"];
        $newPost->user_id = auth()->user()->id;
        $newPost->save();

        //image creation and adding.
        
        if($request->file('image')) {
            $newImage = new Image();
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
       
            $newImage->image = $filename;
           
            $newImage->post_id = $newPost->id;
            $newImage->save();
        }
        

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
        if(!($currentUser->id == $post->user_id) and ($currentUser->isAdmin === 0)) {
            return redirect()->back();
        }
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
        return redirect()->back();
        //return redirect()->route('user.show',['id' => $currentUser->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $currentUser = auth()->user();
        $post = Post::findOrFail($id);
        if(!($currentUser->id == $post->user_id) and ($currentUser->isAdmin === 0)) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('user.show',['id' => $currentUser->id]);
    }
}
