<div>
    <p>post start</p>
    <a href="{{ route('user.show', ['id' => $user->id]) }}"><p>{{ $user->name }}</p></a>
    <p>{{ $post->text }}</p>
</div>