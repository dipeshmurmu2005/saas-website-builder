<div class="pt-60 px-60">
    <div>
        <div class="flex justify-center items-center flex-col text-center gap-5">
            <h4 class="w-fit px-4 py-2 text-sm bg-primary/5 text-primary rounded-full">Products By Grid Layers</h4>
            <div class="px-60">
                <h4 class="text-5xl font-bold leading-snug">One platform, <span
                        class="font-black text-primary">multiple</span> business products</h4>
            </div>
        </div>
        <div class="mt-20 flex justify-center">
            @foreach ($this->business_types as $type)
                <div class="w-100 bg-linear-to-br from-[#BF40BF]/4 to-primary/4 p-10 rounded-2xl shadow-xs space-y-5">
                    <div class="h-14 w-14 bg-primary rounded-2xl flex justify-center items-center text-white">
                        <x-heroicon-m-academic-cap class="h-8 w-8" />
                    </div>
                    <div class="space-y-2">
                        <h2 class="text-2xl font-bold">{{ $type->name }}</h2>
                        <p class="text-black/60">Complete management suite for modern educational centers and private
                            tutors.</p>
                    </div>
                    <div class="space-y-5">
                        <div class="flex gap-2 items-center text-sm">
                            <x-heroicon-m-check-circle class="h-6 w-6 text-primary" />
                            <span>Website & SEO</span>
                        </div>
                        <div class="flex gap-2 items-center text-sm">
                            <x-heroicon-m-check-circle class="h-6 w-6 text-primary" />
                            <span>Student Portal</span>
                        </div>
                        <div class="flex gap-2 items-center text-sm">
                            <x-heroicon-m-check-circle class="h-6 w-6 text-primary" />
                            <span>Automated Payments</span>
                        </div>
                        <div class="flex gap-2 items-center text-sm">
                            <x-heroicon-m-check-circle class="h-6 w-6 text-primary" />
                            <span>Attendance Tracking</span>
                        </div>
                    </div>
                    <div class="space-y-5 mt-8">
                        <div>
                            <a href="{{ route('platform.product', ['slug' => $type->slug]) }}">
                                <button class="btn btn-primary h-14 w-full">Explore Product</button>
                            </a>
                        </div>
                        <div class="flex justify-center">
                            <a href="#"class="text-primary text-sm font-medium inline-flex gap-1 items-center">View
                                Demo <x-heroicon-m-arrow-right class="h-4 w-4" /> </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
