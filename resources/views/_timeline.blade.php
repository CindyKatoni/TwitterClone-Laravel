<div class="border border-gray-300 rounded-lg">
    @forelse ($tweets as $tweet)
        @include ('_tweet')
    @empty
    <p class="p-4"> No Tweets Yet... </p>    
    @endforelse

    
    {{ $tweets->links('pagination::tailwind')}}
</div>