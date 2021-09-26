<div class="flex p-4 border-b border-b-gray-400">
                    <!--Avatar Section-->
                    <div class="mr-2 flex-shrink-0"><img src="{{ $tweet->user->avatar }}" class="rounded-full mr-2" alt=""></div>

                    <!-- User name and details Section-->
                    <div>
                        <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
                        <p class="text-sm">{{ $tweet->body }}</p>
                    </div>
</div>