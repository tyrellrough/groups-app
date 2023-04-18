<div>
    <p>post start</p>
    <a href="{{ route('user.show', ['id' => $user->id]) }}"><p>{{ $user->name }}</p></a>
    <p>{{ $post->text }}</p>
    <p></p>
    

    @if($post->user_id === $currentUser->id)
        <a href="{{ route('posts.edit', ['id' => $post->id]) }}">Edit post</button></a>
    @endif
</div>
