<div>
    @section('seo')
        <x-business.tours.themes.modern.seo :seo="$this->page" />
    @endsection
    <div class="px-5 pt-28 md:pt-48 lg:pb-20 2xl:pb-48 lg:px-50 2xl:px-60">
        <div class="flex justify-center items-center">
            <h2 class="px-3 py-2 bg-black/10 rounded-full text-sm">Contact Us</h2>
        </div>
        <div
            class="text-4xl lg:px-30 2xl:px-50 flex justify-center mt-5 lg:text-[5rem] 2xl:text-[6rem] font-black text-center leading-snug">
            <h2>We've Been Waiting For You</h2>
        </div>
        <div class="grid md:grid-cols-2 gap-10 mt-20 px:20 2xl:px-28">
            <div>
                <div class="rounded-3xl overflow-hidden h-80 md:h-100">
                    <img src="https://blog.ipleaders.in/wp-content/uploads/2020/02/tata_communication_hq_660_100120025251.jpg"
                        alt="" class="h-full w-full object-cover">
                </div>
            </div>
            <div>
                <h2 class="font-bold text-2xl">Let's Connect</h2>
                @error('rate_limit')
                    <div class="bg-error/5 w-fit rounded-xl mt-5 text-error px-3 py-3 text-sm flex gap-1 items-center">
                        <x-heroicon-m-information-circle class="h-4 w-4" />
                        <span>{{ $message }}</span>
                    </div>
                @enderror
                <form class="mt-5 grid md:grid-cols-2 gap-5" wire:submit='submit'>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend text-base">What is your name?</legend>
                        <input type="text" class="input rounded-xl h-12 w-full" wire:model="name"
                            placeholder="John Doe" />
                        @error('name')
                            <span class="label text-error">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend text-base">Your Phone Number</legend>
                        <input type="text" x-mask="9999999999" class="input rounded-xl h-12 w-full"
                            wire:model="phone" placeholder="Type here" />
                        @error('phone')
                            <span class="label text-error">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <fieldset class="fieldset md:col-span-2">
                        <legend class="fieldset-legend text-base">Your Message</legend>
                        <textarea class="textarea h-24 rounded-xl w-full" placeholder="Bio" wire:model="message"></textarea>
                        @error('message')
                            <span class="label text-error">{{ $message }}</span>
                        @enderror
                    </fieldset>
                    <div class="col-span-full space-y-5">
                        @if (session('success'))
                            <div
                                class="bg-success/5 w-fit rounded-xl text-success px-3 py-3 text-sm flex gap-1 items-center">
                                <x-heroicon-m-information-circle class="h-4 w-4" />
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif
                        <div>
                            <button class="btn btn-primary h-12 rounded-xl">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
