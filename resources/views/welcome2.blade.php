@extends('master2')

@section('content')

<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-64 overflow-hidden rounded-lg md:h-96">
        @foreach($events as $event)
            <!-- Item -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('storage/' . $event->gambar_acara) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $event->nama_acara }}">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                {{-- left bawah content tapi diats gambar --}}
                <div class="absolute bottom-5 left-5 text-white">
                    <h3 class="text-lg font-bold mb-2">{{ $event->nama_acara }}</h3>
                    <p class="text-sm md:text-base font-light mb-4">Rating: {{ $event->rating_tertinggi }} - Harga: {{ $event->harga_tiket }}</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach($events as $index => $event)
            <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke -linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>



<div class="container mx-auto px-4 mt-8 dark:border-gray-700 dark:bg-gray-800 " >
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white text-center mt-8 mb-6 ">
        Explore Our Featured Cards
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        @foreach ($upcomingEvents as $coming)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative">
            <a href="#">
                <img class="rounded-t-lg h-48 w-full object-cover" src="{{asset('storage/' .$coming->gambar_acara)}}" alt="Card Image" />
            </a>
        
            <div class="event-date text-center">
                <div class="event-month">{{$coming->month}}</div>
                <div class="event-day">{{$coming->day}}</div>
            </div>
        
            <span class="event-category">{{$coming->category_name}}</span>
        
            <div class="p-3">
                <a href="/events/detail?event_id={{ $coming->id }}" >
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $coming->nama_acara }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ Str::limit($coming->deskripsi, 60) }}{{$coming->lokasi}} ...
                </p>
                <div class="flex justify-between items-center">
                    <a href="/events/detail?event_id={{ $coming->id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                    <span class="text-lg font-bold text-gray-900 dark:text-white ml-4">{{$coming->harga_tiket}}</span>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>


<div class="container mx-auto px-4 mt-8 dark:border-gray-700 dark:bg-gray-800 " >
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white text-center mt-8 mb-6 ">
        Event Category
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($categories as $category)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="#" class="text-decoration-none">
                <div class="relative group category-card overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('storage/' .$category->gambar) }}" alt="{{ $category->category_name }}" class="category-image object-cover w-full h-full">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black bg-opacity-30 transition-opacity duration-300 group-hover:bg-opacity-0"></div>
                    <!-- Title -->
                    <div class="category-overlay absolute inset-0 flex items-end justify-end">
                        <h3 class="mb-2 font-bold category-title text-white text-lg">
                            <i>{{$category->category_name}}</i>
                        </h3>
                    </div>
                </div>
            </a>
        </div>  
        @endforeach          
    </div>
</div>

@endsection