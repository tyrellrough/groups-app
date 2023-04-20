<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupUserController extends Controller
{
    public function index() {
        $user = auth()->user();
        $groups = $user->groups->all();
     
        return view('groupUser.index', ['followedGroups' => $groups, 'user' => $user]);
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
        return redirect()->route('user.show',['id' => $currentUser->id]);
    }
}
