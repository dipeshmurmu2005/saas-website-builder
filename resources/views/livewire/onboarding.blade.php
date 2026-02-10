<div class="py-10 px-60">
    <div class="bg-linear-to-br from-[#000000]/4 to-[#BF40BF]/4 p-18 rounded-2xl">
        <div class="pt-5 flex justify-center flex-col items-center gap-2">
            <h2 class="text-4xl font-black"><span class="text-primary">Step 1</span> / 3</h2>
            <h2 class="text-2xl font-medium">Tell us About your Business</h2>
        </div>
        {{-- <div class="pt-5 flex justify-center flex-col items-center gap-2">
            <h2 class="text-4xl font-black"><span class="text-primary">Step 2</span> / 3</h2>
            <h2 class="text-2xl font-medium">Choose a theme</h2>
        </div> --}}
        {{-- <div class="flex justify-center">
            <div class="pt-5 flex justify-center flex-col items-center gap-2 w-120">
                <h2 class="text-4xl font-black mb-8"><span class="text-primary">Step 3</span> / 3</h2>
                <h2 class="text-3xl font-medium">Choose your website address</h2>
                <p class="text-center text-black/60">This is how people will find your business online. You can always
                    update these settings later from
                    your
                    dashboard</p>
            </div>
        </div> --}}
        <div class="mt-10">
            <div class="flex justify-center flex-col items-center gap-5">
                <div class="bg-white p-10 rounded-2xl w-120">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Business Name</legend>
                        <input type="text" class="input w-full" placeholder="e.g. Acme Corp" />
                        <p class="label">This will be your primary site title</p>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Business Type</legend>
                        <select class="select w-full" wire:model="business_type">
                            @foreach ($this->business_types as $key => $business)
                                <option value="{{ $key }}" wire:key="{{ $key }}">{{ $business }}
                                </option>
                            @endforeach
                        </select>
                        <p class="label">Pre-selected based on your initial choice.</p>
                    </fieldset>
                    <div class="grid grid-cols-2 gap-5">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">City/Location</legend>
                            <label class="input">
                                <x-heroicon-m-map-pin class="h-5 w-5" />
                                <input type="text" required placeholder="e.g. Birtamode/Jhapa" minlength="8" />
                            </label>
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Phone Number</legend>
                            <label class="input">
                                <x-heroicon-m-phone class="h-5 w-5" />
                                <input type="text" required placeholder="+977 984832480" minlength="8" />
                            </label>
                        </fieldset>
                    </div>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Business Contact Email</legend>
                        <label class="input w-full">
                            <x-heroicon-m-envelope class="h-5 w-5" />
                            <input type="text" required placeholder="hello@business.com" minlength="8" />
                        </label>
                        <p class="label">Where customers can reach you directly</p>
                    </fieldset>
                    <div class="flex justify-between">
                        <div></div>
                        <button class="btn btn-primary">Continue</button>
                    </div>
                </div>
                <div class="flex gap-1 items-center text-black/50 text-sm"><x-heroicon-m-lock-closed class="h-4 w-4" />
                    Your
                    data is
                    secured with enterprise grade encryption
                </div>
            </div>
            {{-- <div>
                <div class="grid grid-cols-4 gap-5">
                    <div>
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
                                <div class="grid grid-cols-2 gap-5">
                                    <button class="btn bg-black/5"><x-heroicon-m-play-circle class="h-4 w-4" />
                                        Preview</button>
                                    <button class="btn btn-primary">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
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
                                <div class="grid grid-cols-2 gap-5">
                                    <button class="btn bg-black/5"><x-heroicon-m-play-circle class="h-4 w-4" />
                                        Preview</button>
                                    <button class="btn btn-primary">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
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
                                <div class="grid grid-cols-2 gap-5">
                                    <button class="btn bg-black/5"><x-heroicon-m-play-circle class="h-4 w-4" />
                                        Preview</button>
                                    <button class="btn btn-primary">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
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
                                <div class="grid grid-cols-2 gap-5">
                                    <button class="btn bg-black/5"><x-heroicon-m-play-circle class="h-4 w-4" />
                                        Preview</button>
                                    <button class="btn btn-primary">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="flex justify-center flex-col items-center gap-10">
                <div class="w-180 grid grid-cols-2 gap-10">
                    <div class="bg-white p-5 ring-2 rounded-2xl ring-primary ring-offset-5 shadow-xs space-y-5">
                        <div class="w-full relative flex justify-between">
                            <div
                                class="h-12 w-12 rounded-xl bg-primary/4 text-primary flex justify-center items-center">
                                <x-heroicon-m-globe-alt class="h-8 w-8" />
                            </div>
                            <div class="abolute right-0 top-0">
                                <input type="radio" name="radio-4" class="radio radio-primary" checked="checked" />
                            </div>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Free Subdomain</h2>
                            <p class="text-sm text-black/70">Perfect for getting started instantly with no cost</p>
                        </div>
                        <div>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">YOUR URL</legend>
                                <label class="input">
                                    <input type="url" placeholder="my-business" />
                                    <div class="border-l pl-2 font-bold border-black/10">.ongridlayers.com</div>
                                </label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="bg-white p-5 rounded-2xl ring-offset-5 shadow-xs space-y-5">
                        <div class="w-full relative flex justify-between">
                            <div
                                class="h-12 w-12 rounded-xl bg-primary/4 text-primary flex justify-center items-center">
                                <x-heroicon-m-globe-alt class="h-8 w-8" />
                            </div>
                            <div class="abolute right-0 top-0">
                                <input type="radio" name="radio-4" class="radio radio-primary" />
                            </div>
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Custom Domain</h2>
                            <p class="text-sm text-black/70">Connect a professional domain like .com or .org</p>
                        </div>
                        <div class="flex gap-2 items-end">
                            <fieldset class="fieldset pb-0">
                                <legend class="fieldset-legend">YOUR URL</legend>
                                <input type="text" class="input" placeholder="example.com" />
                            </fieldset>
                            <div>
                                <button class="btn btn-primary">Check</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-primary/5 p-8 w-180 rounded-2xl flex gap-3 items-start">
                    <div>
                        <div class="h-10 w-10 bg-primary/10 rounded-xl flex justify-center items-center">
                            <x-heroicon-m-information-circle class="h-5 w-5 text-primary" />
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h2 class="font-semibold">Important Note about DNS</h2>
                        <p class="text-sm text-black/70"> If you choose a custom domain, you'll need to update your DNS
                            records (A and CNAME) with
                            your provider. Don't worry, we'll provide step-by-step instructions in the next step.
                            Changes can take up to 24-48 hours to propagate worldwide.</p>
                        <a href="#" class="text-sm text-primary flex gap-1 items-center w-fit">Read our domain
                            guide <x-heroicon-o-arrow-top-right-on-square class="h-4 w-4" /></a>
                    </div>
                </div>
                <div class="flex justify-between items-center w-180">
                    <button>Back</button>
                    <button class="btn btn-primary">Continue to Launch</button>
                </div>
            </div> --}}
        </div>
    </div>
</div>
