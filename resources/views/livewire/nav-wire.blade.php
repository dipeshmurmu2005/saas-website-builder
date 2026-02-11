<div class="px-60 py-5">
    <div class="flex justify-between items-center">
        <div class="flex gap-20 items-center">
            <a href="{{ route('platform.home') }}" class="flex gap-1 font-jakarta items-center font-black text-base">
                <div class="h-12 w-fit">
                    <img src="{{ asset('images/gridlayer.png') }}" alt="" class="h-full w-full object-contain">
                </div>
                <h3>Grid Layers</h3>
            </a>
            <div class="text-sm font-semibold flex gap-5 items-center">
                <a href="#">Products</a>
                <a href="#">Customers</a>
                <a href="#">Pricing</a>
            </div>
        </div>
        <div class="flex gap-2 items-center">
            @guest
                <button class="btn text-xs bg-black/4">Login</button>
                <button class="btn btn-primary text-xs">Get Started</button>

            @endguest
            @auth
                <div>
                    <a href="#" class="flex gap-2 items-center text-sm font-semibold">
                        <div class="h-8 w-8 rounded-full overflow-hidden ring-2 ring-offset-2 ring-primary">
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&color=0057FF"
                                alt="" class="h-full w-full object-cover">
                        </div>
                        <span><span class="text-primary">Hi</span>, {{ auth()->user()->name }}</span>
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>
