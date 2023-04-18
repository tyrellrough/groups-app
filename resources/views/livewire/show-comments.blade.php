<div>
    <p>-------------------------------------</p>
    <a href="{{ route('user.show', ['id' => $user->id]) }}"><p>{{ $user->name }}</p></a>
    <p>{{ $comment->text }}</p>
    
</div>
