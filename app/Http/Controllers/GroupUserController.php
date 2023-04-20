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
            'userInGroup' => 'required',
        ]);
        
        $currentUser = auth()->user();
        $groupToAttach = Group::findOrFail($id);
        $isUserInGroup = $validatedData['userInGroup'];
        if($isUserInGroup === "true") {
            $currentUser->groups()->detach($groupToAttach);
        } elseif ($isUserInGroup === "false") {
            $currentUser->groups()->attach($groupToAttach);
        }
        return redirect()->route('groups.index');
    }
}
