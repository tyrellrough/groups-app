<div>
    <p>post start</p>
    <a href="{{ route('user.show', ['id' => $user->id]) }}"><p>{{ $user->name }}</p></a>
    <p>{{ $post->text }}</p>
    <p></p>
    

    @if($post->user_id === $currentUser->id)
        <button type="button">Edit post</button> 
    @endif
</div>
