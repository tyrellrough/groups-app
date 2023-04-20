<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupUserController extends Controller
{
    public function index() {
        $user = auth()->user();
        $groups = $user->groups;
        return view('groupUser.index', ['followedGroups' => $groups, 'user' => $user]);
    }
}
