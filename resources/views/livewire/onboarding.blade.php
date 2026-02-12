<div class="py-10 px-60">
    <div class="bg-linear-to-br from-[#000000]/4 to-[#BF40BF]/4 p-18 rounded-2xl">
        @if ($this->activeStep == 1)
            <div class="pt-5 flex justify-center flex-col items-center gap-2">
                <h2 class="text-4xl font-black"><span class="text-primary">Step 1</span> / 4</h2>
                <h2 class="text-2xl font-medium">Tell us About your Business</h2>
            </div>
        @endif

        @if ($this->activeStep == 2)
            <div class="pt-5 flex justify-center flex-col items-center gap-2">
                <h2 class="text-4xl font-black"><span class="text-primary">Step 2</span> / 4</h2>
                <h2 class="text-2xl font-medium">Choose a theme</h2>
            </div>
        @endif

        @if ($this->activeStep == 3)
            <div class="flex justify-center">
                <div class="pt-5 flex justify-center flex-col items-center gap-2 w-120">
                    <h2 class="text-4xl font-black mb-8"><span class="text-primary">Step 3</span> / 4</h2>
                    <h2 class="text-3xl font-medium">Choose your website address</h2>
                    <p class="text-center text-black/60">This is how people will find your business online. You can
                        always
                        update these settings later from
                        your
                        dashboard</p>
                </div>
            </div>
        @endif

        @if ($this->activeStep == 4)
            <div class="flex justify-center">
                <div class="pt-5 flex justify-center flex-col items-center gap-2 w-120">
                    <h2 class="text-4xl font-black mb-8"><span class="text-primary">Step 3</span> / 4</h2>
                    <h2 class="text-3xl font-medium">Review & Chekout</h2>
                    <p class="text-center text-black/60">This is how people will find your business online. You can
                        always
                        update these settings later from
                        your
                        dashboard</p>
                </div>
            </div>
        @endif
        <div class="mt-10">
            @if ($this->activeStep == 1)
                <div class="flex justify-center flex-col items-center gap-5">
                    <div class="bg-white p-10 rounded-2xl w-120">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Business Name</legend>
                            <input type="text"
                                class="input w-full {{ $errors->has('business_name') ? 'border-error' : '' }}"
                                wire:model="business_name" placeholder="e.g. Acme Corp" />
                            <p class="label">This will be your primary site title</p>
                            @error('business_name')
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Business Type</legend>
                            <select class="select w-full {{ $errors->has('business') ? 'border-error' : '' }}"
                                wire:model="business">
                                @foreach ($this->businesses as $key => $business)
                                    <option value="{{ $key }}" wire:key="{{ $key }}">
                                        {{ $business }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="label">Pre-selected based on your initial choice.</p>
                            @error('business')
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <div class="grid grid-cols-2 gap-5">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">City/Location</legend>
                                <label class="input {{ $errors->has('location') ? 'border-error' : '' }}">
                                    <x-heroicon-m-map-pin class="h-5 w-5" />
                                    <input type="text" required placeholder="e.g. Birtamode/Jhapa"
                                        wire:model="location" minlength="8" />
                                </label>
                                @error('location')
                                    <p class="label text-error">{{ $message }}</p>
                                @enderror
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Phone Number</legend>
                                <label class="input {{ $errors->has('phone') ? 'border-error' : '' }}">
                                    <x-heroicon-m-phone class="h-5 w-5" />
                                    <input type="text" wire:model="phone" required placeholder="+977 984832480"
                                        minlength="8" />
                                </label>
                                @error('phone')
                                    <p class="label text-error">{{ $message }}</p>
                                @enderror
                            </fieldset>
                        </div>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Business Contact Email</legend>
                            <label class="input w-full {{ $errors->has('email') ? 'border-error' : '' }}">
                                <x-heroicon-m-envelope class="h-5 w-5" />
                                <input type="text" required wire:model="email" placeholder="hello@business.com"
                                    minlength="8" />
                            </label>
                            <p class="label">Where customers can reach you directly</p>
                            @error('email')
                                <p class="label text-error">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <div class="flex justify-between">
                            <div></div>
                            <button class="btn btn-primary" wire:click="switchToTheme()">
                                <span class="loading loading-xs" wire:loading wire:target="switchToTheme()"></span>
                                Continue</button>
                        </div>
                    </div>
                    <div class="flex gap-1 items-center text-black/50 text-sm"><x-heroicon-m-lock-closed
                            class="h-4 w-4" />
                        Your
                        data is
                        secured with enterprise grade encryption
                    </div>
                </div>
            @endif
            @if ($this->activeStep == 2)
                <div class="flex flex-col items-center">
                    {{ $errors }}
                    <div class="grid grid-cols-4 gap-5">
                        @foreach ($this->themes as $theme)
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
                                        <p class="text-sm text-black/80">In both processes, you can use a website themes
                                            or
                                            templates in order to make the
                                            process
                                            faster, easier and better. </p>
                                        <div class="grid grid-cols-2 gap-5">
                                            <button class="btn bg-black/5"><x-heroicon-m-play-circle class="h-4 w-4" />
                                                Preview</button>
                                            @if ($theme->slug == $this->theme)
                                                <button class="btn btn-primary"><x-heroicon-m-check-circle
                                                        class="h-5 w-5" /> Selected</button>
                                            @else
                                                <button class="btn btn-primary"
                                                    wire:click="selectTheme('{{ $theme->slug }}')">Select</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-between items-center w-180 mt-10">
                        <button>Back</button>
                        <button class="btn btn-primary" wire:click="switchToWebAddress">Continue</button>
                    </div>
                </div>
            @endif

            @if ($this->activeStep == 3)
                <div class="flex justify-center flex-col items-center gap-10">
                    <div class="w-180 grid grid-cols-2 gap-10">
                        <div class="bg-white p-5 ring-2 rounded-2xl ring-primary ring-offset-5 shadow-xs space-y-5">
                            <div class="w-full relative flex justify-between">
                                <div
                                    class="h-12 w-12 rounded-xl bg-primary/4 text-primary flex justify-center items-center">
                                    <x-heroicon-m-globe-alt class="h-8 w-8" />
                                </div>
                                <div class="abolute right-0 top-0">
                                    <input type="radio" name="radio-4" class="radio radio-primary"
                                        checked="checked" />
                                </div>
                            </div>
                            <div>
                                <h2 class="font-bold text-lg">Free Subdomain</h2>
                                <p class="text-sm text-black/70">Perfect for getting started instantly with no cost</p>
                            </div>
                            <div>
                                <fieldset class="fieldset">
                                    <legend class="fieldset-legend">YOUR URL</legend>
                                    <label
                                        class="input {{ $errors->has('fullsubdomain') ? 'border-error' : '' }} {{ $this->subdomain ? ($this->subdomaintaken ? 'border-error' : 'border-success') : '' }}">
                                        <input type="url" placeholder="my-business"
                                            wire:model.live="subdomain" />
                                        <div class="border-l pl-2 font-bold border-black/10 flex gap-1 items-center">
                                            .ongridlayers.com
                                            @if ($this->subdomain)
                                                @if (!$this->subdomaintaken)
                                                    <x-heroicon-m-check-circle class="text-success h-4 w-4" />
                                                @endif
                                            @endif
                                        </div>
                                    </label>
                                    @if ($this->subdomain)
                                        @if ($this->subdomaintaken)
                                            <p class="label text-error text-wrap">subdomain has already been taken type
                                                new</p>
                                        @endif
                                    @endif
                                </fieldset>
                            </div>
                        </div>
                        <div
                            class="bg-white p-5 rounded-2xl ring-offset-5 shadow-xs space-y-5 pointer-events-none select-none opacity-80">
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
                                    <input type="text" class="input" disabled wire:model="custom_domain"
                                        placeholder="example.com" />
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
                            <p class="text-sm text-black/70"> If you choose a custom domain, you'll need to update your
                                DNS
                                records (A and CNAME) with
                                your provider. Don't worry, we'll provide step-by-step instructions in the next step.
                                Changes can take up to 24-48 hours to propagate worldwide.</p>
                            <a href="#" class="text-sm text-primary flex gap-1 items-center w-fit">Read our
                                domain
                                guide <x-heroicon-o-arrow-top-right-on-square class="h-4 w-4" /></a>
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-180">
                        <button>Back</button>
                        <button class="btn btn-primary" wire:click="switchToCheckout()">Continue</button>
                    </div>
                </div>
            @endif
            @if ($this->activeStep == 4)
                <div class="flex justify-center">
                    <div class="space-y-5 w-140">
                        <div class="bg-white grid grid-cols-3 rounded-xl">
                            <div class="p-5 rounded-xl">
                                <h2 class="font-bold text-sm text-black/50">Plan</h2>
                                <h3 class="font-medium text-success">Basic</h3>
                            </div>
                            <div class="p-5 rounded-xl">
                                <h2 class="font-bold text-sm text-black/50">Business</h2>
                                <h3 class="font-medium text-primary">Institute</h3>
                            </div>
                            <div class="p-5 rounded-xl">
                                <h2 class="font-bold text-sm text-black/50">Theme</h2>
                                <h3 class="font-medium text-primary">Classic</h3>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="bg-linear-to-br from-[#BF40BF]/4 to-primary/4 p-5 rounded-xl space-y-2">
                                <div>Rs. <span class="text-4xl font-bold">499</span> /mo</div>
                                <p class="text-sm text-black/60">This is how people will find your business online.</p>
                            </div>
                            <div class="bg-linear-to-br from-[#BF40BF]/4 to-primary/4 p-5 rounded-xl space-y-2">
                                <div>Rs. <span class="text-4xl font-bold">1999</span> /year</div>
                                <p class="text-sm text-black/60">This is how people will find your business online.</p>
                            </div>
                        </div>
                        <div class="bg-white p-5 shadow-xs rounded-xl space-y-2">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span class="font-black">Rs. 499</span>
                            </div>
                            <div class="flex justify-between font-black text-lg">
                                <span>Total Amount</span>
                                <span class="font-black text-primary">Rs. 499</span>
                            </div>
                        </div>
                        <div class="flex justify-center items-center gap-2">
                            <button class="btn btn-primary h-12">Checkout</button>
                            <button class="btn btn-primary h-12 btn-outline">Start Free Trial</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
