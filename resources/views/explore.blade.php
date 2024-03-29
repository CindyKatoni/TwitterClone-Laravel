<x-app>
    <div>
        @foreach ($users as $user)
            <a href="{{ $user->path() }}" class="flex items-center  mb-4">
                <img src="{{ $user->avatar }}" alt="{{ $user->username }}'s avatar" width="50" class="mr-4 rounded">

                <div>
                    <h4 class="font-bold">{{ '@' . $user->username }}</h4>
                </div>
            </a>

        @endforeach

        {{ $users->links('pagination::tailwind') }}
        
    </div>
</x-app>