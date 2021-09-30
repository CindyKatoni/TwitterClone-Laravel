<x-app>
    <div>
        @foreach ($users as $user)
        <div class="flex items-center  mb-4">
        <a href="{{ $user->path() }}" class="">
                <img src="{{ $user->avatar }}" alt="{{ $user->username }}'s avatar" width="50" class="mr-4 rounded">

                <div>
                    <h4 class="font-bold">{{ '@' . $user->username }}</h4>
                </div>
            </a>

            <!--Follow Button -->
            @if (current_user()->isNot($user))
            <!-- <form method="POST" action="/profiles/{{ $user->name }}/follow"> -->
            <form method="POST" action="{{ route('follow', $user->name)}}">
            @csrf
                <button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-sm">
                    {{ current_user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
                </button>
            </form>
            @endif

        </div>
            

        @endforeach

        {{ $users->links('pagination::tailwind') }}
        
    </div>
</x-app>