<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @forelse (current_user()->follows as $user)
    <li class="mb-4">
        <div >
            <a href="{{ $user->path() }}" class="flex items-center text-sm">
            <img src="{{ $user->avatar }}" class="rounded-full mr-2" width="50" height="50" alt="">
            {{ $user->name }}
            </a>
        </div>
    </li>
    @empty
    <p class="p-4"> No Friends Yet...</p>
    @endforelse
</ul>