 @props(['destination'])
 <a href="{{ route('destination.view', ['slug' => $destination->slug]) }}"
     class="rounded-3xl overflow-hidden lg:h-90 2xl:h-110 relative group">
     <img src="{{ Storage::url($destination->cover_image) }}" alt=""
         class="h-full w-full object-cover group-hover:scale-110 transition-all group-hover:rotate-2 duration-300">
     <div
         class="absolute left-0 top-0 h-full w-full bg-linear-to-t from-black/90 to-transparent lg:p-5 2xl:p-8 flex items-end">
         <div class="text-white space-y-2">
             <div>
                 <h2 class="font-black lg:text-lg 2xl:text-xl">{{ $destination->name }}</h2>
                 <p class="lg:text-sm 2xl:text-base capitalize">{{ $destination->short_description }}
                 </p>
             </div>
             <button class="btn btn-sm rounded-lg h-10 bg-white/30 border-none text-white">View
                 Packages</button>
         </div>
     </div>
     <div class="absolute right-8 top-8 flex w-fit gap-1 items-center text-white">
         <x-heroicon-m-map-pin class="h-5 w-5" />
         <span>{{ $destination->country->name }}</span>
     </div>
 </a>
