<div class="w-full p-4 border-b flex">
    <div class="py-2 w-full">
        <div class="font-semibold">
        <a href="{{ route('user.show', ['id' => $user->id]) }}" ><p>{{ $user->name }}</p></a>
        </div>
        <div class="">
        <a href="{{ route('posts.show', ['id' => $post->id]) }}"><p>{{ $post->text }}</p></a>
        </div>
        <div class="w-full">
        @if(!($post->image === null))
        <img src="{{ url('/images/'.$post->image->image) }}" style="height: 70%; width: 70%;" class="py-2">
        @endif
        </div>

    
        @if($post->user_id === $currentUser->id || $currentUser->isAdmin === 1)
            <a href="{{ route('posts.edit', ['id' => $post->id]) }}">Edit post</button></a>
        @endif
    </div>
</div>
