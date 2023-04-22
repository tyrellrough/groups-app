<div class="w-full p-4 border-b flex">
<div class="py-2 w-full">
    <a href="{{ route('user.show', ['id' => $user->id]) }}"><p>{{ $user->name }}</p></a>
    <p>{{ $comment->text }}</p>
    @if(($comment->user_id === $currentUser->id) || ($currentUser->isAdmin === 1))
        <a href="{{ route('comments.edit', ['id' => $comment->id]) }}">Edit Comment</button></a>
    @endif
</div>
    
</div>
