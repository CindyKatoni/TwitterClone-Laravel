<x-app>
    <!-- <h3>profile page for {{ $user->name }}</h3>     -->
    <header class="mb-6 relative">
        <img src="/images/banner.jpg" alt="">

        <div class="flex justify-between items-center mb-4">
        <div style="max-width: 270px">
            <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
            <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
        </div>

        <div class="flex">
            @if (current_user()->is($user))

            <a href="{{ $user->path('edit') }}" class="rounded-full border border-gray-300 py-2 px-4 text-black text-sm">Edit Profile</a>
            @endif

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
        </div>

        <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
             aliquip ex ea commodo consequat.
        </p>
        <!-- Users avatar -->
        <img src="{{ $user->avatar}}" alt="" class="rounded-full mr-2 absolute style" style="width: 150px; left:calc(50% - 75px); top:55%; "> 
        
    </header>
    
   
    @include ('_timeline', [
        'tweets' => $tweets
    ])
    </x-app>
