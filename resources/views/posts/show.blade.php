<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section id="PostSection">
                        <div class="post">
                            @livewire('show-posts',['post' => $post, 'currentUser' => $currentUser])
                        </div>
                        <div class="w-full p-4 border-b flex">
                            <label>New Comment<form method="post" action="{{ route('comments.store') }}">
                                    @csrf
                                    <textarea name="text" maxlength="1000" rows="5" required class="w-full"> </textarea>
                                    <input type="hidden" name="postID" value="{{ $post->id  }}">
                                    <input type="submit" value="Submit" class="w-full">
                                </form></label>
                        </div>

                        @foreach ($post->comments as $comment)
                        <div class="comment">
                            @livewire('show-comments',['comment' => $comment, 'currentUser' => $currentUser])
                        </div>
                        @endforeach
                    </section>


                </div>
            </div>
        </div>
</x-app-layout>