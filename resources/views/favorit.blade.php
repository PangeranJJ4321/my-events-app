@extends('master2')

@section('content')
    <div class="container mx-auto px-4 mt-8 dark:border-gray-700 dark:bg-gray-800 " >
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white text-center mt-8 mb-6 ">
            Favorit Event
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            @foreach ($favoriteEvents as $event)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative">
                <a href="#">
                    <img class="rounded-t-lg h-48 w-full object-cover" src="{{asset('storage/' .$event->gambar_acara)}}" alt="Card Image" />
                </a>
            
            
                <div class="p-3">
                    <a href="#">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $event->nama_acara }}
                        </h5>
                    </a>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-calendar-alt text-gray-400 mr-2"></i>
                        <span>{{ $event->tanggal_waktu }}</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                        <span>{{ $event->lokasi }}</span>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-400">Price</p>
                        <div class="flex items-center">
                            <i class="fas fa-dollar-sign text-gray-400 mr-2"></i>
                            <span>{{$event->harga_tiket}}</span>
                        </div>
                    </div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ Str::limit($event->deskripsi, 100, '...') }}
                    </p>
                    <div class="flex justify-between items-center">
                        <a href="/events/detail?event_id={{ $event->id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        <form action="{{ route('favorite-events.destroy', $event->id) }}" 
                            onsubmit="return confirm('Are you sure you want to delete this from your favorites?');" 
                            method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" 
                                  class="flex items-center py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-red-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-red-500 dark:hover:bg-red-700">
                              <i class="fas fa-trash-alt mr-2"></i> Delete
                          </button>
                      </form>
                      
                    </div>
                </div>
            </div> 
            @endforeach
        </div>

    </div>

@endsection