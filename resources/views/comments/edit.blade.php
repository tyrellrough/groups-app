<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <section id="editPostSection">
                    <h4>Editing Comment</h4>
      <form method="POST" action="{{ route('comments.update', ['id' => $comment->id]) }}">
        @csrf
        @method('patch')
        <label><h4>Text</h4><input type="text" name="text" value="{{ $comment->text }}" maxlength="1000" required></label>
        <input type="submit" value="Submit">
      </form>
      <form method="POST" action="{{ route('comments.destroy', ['id' => $comment->id]) }}">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">
      </form>

    
  </section>
        

            </div>
        </div>
    </div>
</x-app-layout>