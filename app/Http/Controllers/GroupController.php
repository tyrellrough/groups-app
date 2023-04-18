<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function index() {
        $groups = Group::all();
        $user = auth()->user();
        return view('groups.index', ['groups' => $groups, 'user' => $user]);
    }

    public function show($name) {
        $group = Group::findOrFail($name);
        $page = Page::findOrFail($group->page_id);
        $posts = Post::where('page_id', $page->id)->get();
        return view('groups.show', ['group' => $group, "page" => $page , 'posts' => $posts]);
    }
}
