
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
      <label>New post<form method="post" enctype="multipart/form-data" action="{{ route('posts.store') }}">
        @csrf

        <label>Text </h4><input type="text" name="text" maxlength="1000" required></label>
        <label>Image <input type="file" class="form-control" name="image"></label>
        <input type="hidden" name="pageID" value="{{ $page->id  }}">
        <input type="hidden" name="groupID" value="{{ $group->id  }}">
        <input type="submit" value="Submit">
      </form></label>
    
  </section>
        
        @foreach ($posts as $post)
          <a href="{{ route('posts.show', ['id' => $post->id]) }}"><div class="post" id="post{{$post->id}}">
            @livewire('show-posts',['post' => $post, 'currentUser' => $currentUser])
          </div></a>
        @endforeach

          </div>
        </div>
    </div>
</x-app-layout>