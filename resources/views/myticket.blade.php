@extends('master2')

@section('content')

<div class="container mx-auto px-4 mt-8 dark:border-gray-700 dark:bg-black-800 " >
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white text-center mt-8 mb-6 ">
        My tickets
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($bookings as $booking)
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#" class="flex items-center space-x-2">
                <h3 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                    {{$booking->nama_acara}}
                </h3>
            </a>               
            <div class="flex flex-col pt-3"></div>
            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400"><i class='bx bxs-calendar'></i>Date</dt>
                    <dd class="text-lg font-semibold">{{$booking->tanggal_waktu}}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400"><i class='bx bx-location-plus'></i> Location</dt>
                    <dd class="text-lg font-semibold">{{$booking->lokasi}}</dd>
                </div>
                <div class="flex flex-col pt-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400"><i class='bx bx-info-circle'></i>Status Booking</dt>
                    @if ($booking->status_booking === 'approved')
                    <dd class="text-lg font-semibold text-green-500">{{ ucfirst($booking->status_booking) }}</dd>
                    @else
                    <dd class="text-lg font-semibold text-red-500">{{ ucfirst($booking->status_booking) }}</dd>
                    @endif
                </div>
                <div class="flex flex-col pt-3"></div>
            </dl>
            
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                See more
                <svg class="w-3 h-3 ml-2 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                </svg>
            </button>              
        </div>
        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{$booking->nama_acara}}
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-8">
                            <div class="mt-4 flex shadow dark:bg-gray-800 dark:border-gray-700">
                                <!-- Bagian Informasi Acara -->
                                <div class="p-4 rounded-lg w-1/2">
                                    <div class="flex items-center mb-4">
                                        <i class="fas fa-calendar-alt text-gray-400 mr-2"></i>
                                        <span>{{$booking->tanggal_waktu}}</span>
                                    </div>
                                    <div class="flex items-center mb-4">
                                        <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                                        <span>{{$booking->lokasi}}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-gray-400">Ticket Code</p>
                                        <div class="flex items-center mt-2">
                                            <span class="ml-2 text-gray-400">{{$booking->ticket_code}}</span>
                                        </div>
                                    </div>
                                    @if($booking->lokasi === 'online')
                                    <div class="flex items-center mb-4">
                                        <i class="fas fa-video text-gray-400 mr-2"></i>
                                        <span>Google Meet</span>
                                    </div>
                                    @endif
                                    <div class="mb-4">
                                        <p class="text-gray-400">Duration</p>
                                        <div class="flex items-center">
                                            <i class="fas fa-clock text-gray-400 mr-2"></i>
                                            <span>All day</span>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-gray-400">Price</p>
                                        <div class="flex items-center">
                                            <i class="fas fa-dollar-sign text-gray-400 mr-2"></i>
                                            <span>{{$booking->harga_tiket}}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-gray-400">Status Ticket</p>
                                        <div class="flex items-center">
                                            <i class="fas fa-exclamation-circle text-gray-400 mr-2"></i>
                                            @if ($booking->status_tiket === 'inactive')
                                            <span class="text-red-400">{{ucfirst($booking->status_tiket)}}</span>
                                            @else
                                            <span class="text-green-400">{{ucfirst($booking->status_tiket)}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- Bagian Detail -->
                                <div class="ml-4 w-1/2">
                                    <h3 class="text-lg font-semibold mb-2">Details</h3>
                                    <p class="text-gray-400" style=text-align:justify;>
                                        {{$booking->deskripsi}}
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <div class="flex items-center gap-4">
                                @if ($booking->status_tiket === 'active')
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">    
                                    <i class="fas fa-edit mr-2"></i>Cancel
                                </button>
                                @else
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" disabled class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">    
                                    <i class="fas fa-edit mr-2"></i>Cancel
                                </button>
                                @endif
                                <button type="button" class="py-2 px-3 inline-flex items-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    <svg class="w-3 h-3 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"/><path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/></svg>
                                    Download
                                </button>
                                
                                 
                                <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to cancel this event ticket?</h3>
                                                <div class="flex items-center justify-center space-x-3">
                                                    <form action="{{ route('tickets.cancel', $booking->ticket_code) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Yes, I'm sure
                                                        </button>
                                                    </form>
                                                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                        No, cancel
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            

                            <button data-modal-target="popup-delete" data-modal-toggle="popup-delete" class="bg-red-600 hover:bg-red-700 text-white py-2 px-3 rounded-lg">
                                <i class="fas fa-trash mr-2"></i>Delete
                            </button>  
                            <div id="popup-delete" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-delete">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this ticket?</h3>
                                            <div class="flex items-center justify-center space-x-3">
                                                 
                                                <form action="{{ route('tickets.destroy', $booking->ticket_code) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-modal-hide="popup-delete" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>
                                                </form>
                                            
                                                <button data-modal-hide="popup-delete" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
            
        </div>       
        @endforeach
    </div>
    
@endsection