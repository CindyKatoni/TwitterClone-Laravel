<div class="flex p-4 border-b border-b-gray-400">
                    <!--Avatar Section-->
                    <div class="mr-2 flex-shrink-0">
                        <a href="{{ route('profile', $tweet->user)}}"> <img src="{{ $tweet->user->avatar }}" class="rounded-full mr-2" alt="" width="50" height="50"></a>    
                    </div>

                    <!-- User name and details Section-->
                    <div>
                        <a href=""></a>
                        <h5 class="font-bold mb-4">
                            <a href="{{ route('profile', $tweet->user->name) }}">{{ $tweet->user->name }}</a>
                        </h5>
                        <p class="text-sm">{{ $tweet->body }}</p>
                    </div>
</div>