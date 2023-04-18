
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <section id="newPostSection">
      <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <label><h4>Text</h4><input type="text" name="text" maxlength="1000" required></label>
        <input type="hidden" name="pageID" value="{{ $page->id  }}">
        <input type="hidden" name="groupID" value="{{ $group->id  }}">
        <input type="submit" value="Submit">
      </form>
    
  </section>
        
        @foreach ($posts as $post)
          <div class="post" id="post{{$post->id}}">
            @livewire('show-posts',['post' => $post])
          
          @foreach ($post->comments as $comment)
                <div class="comment">
                  @livewire('show-comments',['comment' => $comment])
                </div>
               
  
          @endforeach
          <div class="newComment">
              <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <p>Text<input type="text" name="text" maxlength="1000" required></p>
                <input type="hidden" name="postID" value="{{ $post->id  }}">
                <input type="hidden" name="groupID" value="{{ $group->id  }}">
        
                <input type="submit" value="Submit">
              </form>
            </div>
          </div>
        @endforeach

            </div>
        </div>
    </div>
</x-app-layout>