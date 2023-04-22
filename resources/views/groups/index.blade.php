<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($groups as $group)
                    <div class="w-full p-4 border-b flex">
                        <div class="w-full">
                            <li><a href="{{ route('groups.show', ['id' => $group->id]) }}"> {{ $group->name }}</a></li>
                        </div>
                        <div class="w-full">
                            @if(in_array($group->id, $followedGroups, false))
                            <form method="POST" action="{{ route('groupUser.update', ['id' =>$group->id]) }}">
                                @csrf
                                @method('patch')
                                <input type="hidden" id="userInGroup" name="userInGroup" value="true">
                                <input type="submit" value="Leave Group">
                            </form>
                            @else
                            <form method="POST" action="{{ route('groupUser.update', ['id' =>$group->id]) }}">
                                @csrf
                                @method('patch')
                                <input type="hidden" id="userInGroup" name="userInGroup" value="false">
                                <input type="submit" value="Join Group">
                            </form>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>