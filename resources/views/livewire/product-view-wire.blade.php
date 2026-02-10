<div class="py-32">
    <div class="px-170 text-center flex flex-col items-center justify-center gap-2">
        <h2 class="leading-snug font-bold text-5xl px-10">Revenue-first <span class="text-primary">web</span> analytics
        </h2>
        <p class="px-20 text-black/60">See every visitor in realtime and witness the moment they become a customer.</p>
        <div class="flex gap-2 justify-center mt-5">
            <button class="btn btn-primary">Get Started</button>
            <button class="btn bg-black/5"><x-heroicon-m-play-circle class="h-5 w-5" /> See Demo</button>
        </div>
    </div>
    <div class="bg-black/2 py-10 mt-32 relative px-80 pb-32">
        <div class="py-20 flex flex-col items-center justify-center px-80 text-center space-y-5">
            <h3 class="text-sm w-fit px-5 py-3 bg-primary/5 text-primary rounded-full">Grid Layers Theme</h3>
            <div class="text-5xl space-y-2">
                <div class="font-black">Create your editor </div>
                <div class="italic">with the features you want</div>
            </div>
        </div>
        <div x-data="{
            init() {
                var swiper = new Swiper('.themes', {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                });
            }
        }">
            <div class="swiper themes">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="bg-white p-1 rounded-2xl">
                            <div class="rounded-xl overflow-hidden relative h-50">
                                <img src="https://cdn.dribbble.com/userupload/6509947/file/original-46e2a3328428f742ebc8d74e3cc3e7e4.png?resize=400x0"
                                    alt="" class="h-full w-full object-cover">
                                <div
                                    class="absolute left-0 top-0 h-full w-full bg-linear-to-t from-white/40 to-transparent">

                                </div>
                            </div>
                            <div class="p-5 space-y-2">
                                <h2 class="font-bold">Classic</h2>
                                <p class="text-sm text-black/80">In both processes, you can use a website themes or
                                    templates in order to make the
                                    process
                                    faster, easier and better. </p>
                                <div>
                                    <button class="btn bg-black/5"><x-heroicon-m-play-circle class="h-4 w-4" />
                                        Preview</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white p-1 rounded-2xl">
                            <div class="rounded-xl overflow-hidden relative h-50">
                                <img src="https://img.freepik.com/free-psd/flat-design-home-template_23-2150567210.jpg?semt=ais_hybrid&w=740&q=80"
                                    alt="" class="h-full w-full object-cover">
                                <div
                                    class="absolute left-0 top-0 h-full w-full bg-linear-to-t from-white/40 to-transparent">

                                </div>
                            </div>
                            <div class="p-5 space-y-2">
                                <h2 class="font-bold">Modern</h2>
                                <p class="text-sm text-black/80">In both processes, you can use a website themes or
                                    templates in order to make the
                                    process
                                    faster, easier and better. </p>
                                <div>
                                    <button class="btn bg-black/5"><x-heroicon-m-play-circle class="h-4 w-4" />
                                        Preview</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white p-1 rounded-2xl">
                            <div class="rounded-xl overflow-hidden relative h-50">
                                <img src="https://minimal.gallery/wp-content/uploads/2025/12/danilosierra.com_-900x500.png"
                                    alt="" class="h-full w-full object-cover">
                                <div
                                    class="absolute left-0 top-0 h-full w-full bg-linear-to-t from-white/40 to-transparent">

                                </div>
                            </div>
                            <div class="p-5 space-y-2">
                                <h2 class="font-bold">Premium</h2>
                                <p class="text-sm text-black/80">In both processes, you can use a website themes or
                                    templates in order to make the
                                    process
                                    faster, easier and better. </p>
                                <div>
                                    <button class="btn bg-black/5"><x-heroicon-m-play-circle class="h-4 w-4" />
                                        Preview</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-white p-1 rounded-2xl">
                            <div class="rounded-xl overflow-hidden relative h-50">
                                <img src="https://bunny-wp-pullzone-xsbzasiyjy.b-cdn.net/wp-content/uploads/2025/03/lemmony1.webp"
                                    alt="" class="h-full w-full object-cover">
                                <div
                                    class="absolute left-0 top-0 h-full w-full bg-linear-to-t from-white/40 to-transparent">

                                </div>
                            </div>
                            <div class="p-5 space-y-2">
                                <h2 class="font-bold">Casual</h2>
                                <p class="text-sm text-black/80">In both processes, you can use a website themes or
                                    templates in order to make the
                                    process
                                    faster, easier and better. </p>
                                <div>
                                    <button class="btn bg-black/5"><x-heroicon-m-play-circle class="h-4 w-4" />
                                        Preview</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-80 py-10">
        <div class="grid grid-cols-4 gap-30">
            <div class="space-y-2">
                <div
                    class="h-10 w-10 rounded-full border border-gray-100 flex justify-center items-center text-primary">
                    <x-heroicon-m-cube class="h-5 w-5" />
                </div>
                <div class="text-sm text-black/70"><span class="font-bold text-black">Choose Plan</span> <span>Under
                        1KB. Won't
                        hurt your page
                        speed or Core Web Vitals.</span>
                </div>
            </div>
            <div class="space-y-2">
                <div
                    class="h-10 w-10 rounded-full border border-gray-100 flex justify-center items-center text-primary">
                    <x-heroicon-m-adjustments-horizontal class="h-5 w-5" />
                </div>
                <div class="text-sm text-black/70"><span class="font-bold text-black">Select Theme</span> <span>Under
                        1KB. Won't
                        hurt your page
                        speed or Core Web Vitals.</span>
                </div>
            </div>
            <div class="space-y-2">
                <div
                    class="h-10 w-10 rounded-full border border-gray-100 flex justify-center items-center text-primary">
                    <x-heroicon-m-information-circle class="h-5 w-5" />
                </div>
                <div class="text-sm text-black/70"><span class="font-bold text-black">Add Information</span> <span>Under
                        1KB. Won't
                        hurt your page
                        speed or Core Web Vitals.</span>
                </div>
            </div>
            <div class="space-y-2">
                <div
                    class="h-10 w-10 rounded-full border border-gray-100 flex justify-center items-center text-primary">
                    <x-heroicon-m-rocket-launch class="h-5 w-5" />
                </div>
                <div class="text-sm text-black/70"><span class="font-bold text-black">Launch</span> <span>Under
                        1KB. Won't
                        hurt your page
                        speed or Core Web Vitals.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="px-40 pt-32">
        <h2 class="text-center font-black text-4xl">Pricing</h2>
        <div class="grid grid-cols-4 px-30 mt-20 gap-5">
            <div class="bg-linear-to-br from-[#BF40BF]/4 to-primary/4 p-8 rounded-2xl shadow-xs">
                <div>
                    <h2 class="font-bold text-lg">Start</h2>
                    <p class="text-black/70">For individual projects or prototypes </p>
                </div>
                <div class="mt-5 text-sm font-medium">
                    <span>Rs</span>
                    <span class="text-5xl font-black">499</span>
                    <span>/mo</span>
                </div>
                <div class="mt-5 space-y-4 text-xs">
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> 2 environments
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> 2 developer licenses
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> In-line AI extension
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> Simple DOCX import & export
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> Community support
                    </div>
                </div>
                <div class="mt-10">
                    <a href="{{ route('platform.onboarding', ['business' => $this->business->slug, 'plan' => 1]) }}">
                        <button class="btn btn-primary">Start Free Trial <x-heroicon-m-arrow-right
                                class="h-5 w-5" /></button>
                    </a>
                </div>
            </div>
            <div class="bg-linear-to-br from-[#BF40BF]/4 to-primary/4 p-8 rounded-2xl shadow-xs">
                <div>
                    <h2 class="font-bold text-lg">Team</h2>
                    <p class="text-black/70">For individual projects or prototypes </p>
                </div>
                <div class="mt-5 text-sm font-medium">
                    <span>Rs</span>
                    <span class="text-5xl font-black">999</span>
                    <span>/mo</span>
                </div>
                <div class="mt-5 space-y-4 text-xs">
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> 2 environments
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> 2 developer licenses
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> In-line AI extension
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> Simple DOCX import & export
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> Community support
                    </div>
                </div>
                <div class="mt-10">
                    <button class="btn btn-primary">Start Free Trial <x-heroicon-m-arrow-right
                            class="h-5 w-5" /></button>
                </div>
            </div>
            <div class="bg-linear-to-br from-[#BF40BF]/4 to-primary/4 p-8 rounded-2xl shadow-xs">
                <div>
                    <h2 class="font-bold text-lg">Business</h2>
                    <p class="text-black/70">For individual projects or prototypes </p>
                </div>
                <div class="mt-5 text-sm font-medium">
                    <span>Rs</span>
                    <span class="text-5xl font-black">1999</span>
                    <span>/mo</span>
                </div>
                <div class="mt-5 space-y-4 text-xs">
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> 2 environments
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> 2 developer licenses
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> In-line AI extension
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> Simple DOCX import & export
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> Community support
                    </div>
                </div>
                <div class="mt-10">
                    <button class="btn btn-primary">Start Free Trial <x-heroicon-m-arrow-right
                            class="h-5 w-5" /></button>
                </div>
            </div>
            <div class="bg-linear-to-br from-[#BF40BF]/40 to-primary/40 p-8 rounded-2xl shadow-xs">
                <div>
                    <h2 class="font-bold text-lg">Enterprise</h2>
                    <p class="text-black/70">For individual projects or prototypes </p>
                </div>
                <div class="mt-5 text-sm font-medium">
                    <span class="text-5xl font-black italic">Custom</span>
                </div>
                <div class="mt-5 space-y-4 text-xs">
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> 2 environments
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> 2 developer licenses
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> In-line AI extension
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> Simple DOCX import & export
                    </div>
                    <div class="flex gap-2 items-center">
                        <div><x-heroicon-m-check class="h-4 w-4 text-primary" /></div> Community support
                    </div>
                </div>
                <div class="mt-10">
                    <button class="btn btn-primary">Schedule a meeting <x-heroicon-m-arrow-right
                            class="h-5 w-5" /></button>
                </div>
            </div>
        </div>
    </div>
</div>
