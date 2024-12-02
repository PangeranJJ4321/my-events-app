<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flowbite</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        

        .event-date {
        position: absolute;
        top: 15px;
        left: 15px;
        text-align: center;
        font-weight: bold;
        color: white;
        width: auto;
    }

    .event-date .event-month {
        background-color: #fd6018;
        padding: 10px;
        padding-left: 10px;
        padding-right: 10px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .event-date .event-day {
        background-color: white;
        color: black;
        padding: 5px 8px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }


    .event-category {
        position: absolute;
        top: 15px;
        right: 15px; /* Atur sesuai batas */
        transform: translateX(20px); /* Dorong elemen keluar */
        background-color: white;
        opacity: 0.8;
        color: rgb(19, 18, 18);
        padding: 10px 12px;
        padding-left: 20px;
        border-radius: 8px;
        font-weight: bold;
        box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);
    }

    .category-card {
        position: relative;
        overflow: hidden;
        border-radius: 5px;
        height: 220px;
        transition: transform 0.3s ease;
    }
    .category-card:hover .category-image {
        transform: scale(1.1);
    }
    .category-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .category-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px;
        color: white;
        text-align: right;
    }

    .category-title {
        font-size: 1.7rem;
        margin: 0;
    }

    li[aria-labelledby="dropdownNavbarLink"] {
    position: relative; /* Agar dropdown tidak terpengaruh elemen lain */
    }
    #doubleDropdown {
        z-index: 9999; /* Naikkan z-index jika dropdown tertutup elemen lain */
    }

    </style>

</head>
<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div style="margin-left: 20px" class="flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Ekyy</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
           
            @guest
            <div class="flex gap-2">
                
                <!-- Modal toggle -->
                <button data-modal-target="select-modal" data-modal-toggle="select-modal" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Sign In
                </button>
                
                <!-- Main modal -->
                <div id="select-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Sign in to our platform
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="select-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <p class="text-gray-500 dark:text-gray-400 mb-4">Select your desired position:</p>
                                <ul class="space-y-4 mb-4">
                                    <li>
                                        <a href= '/attendant/login' class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">                           
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Attendant</div>
                                            </div>
                                            <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href= '/organizer/login' class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Organizer</div>
                                            </div>
                                            <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href= '/admin/login' class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Admin</div>
                                            </div>
                                            <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> 
                
                
                
                
                
                <a href='/attendant/register' class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign Up</a>
            </div>

            @else
            <!-- Dropdown menu -->
            <button type="button" class="flex  text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full object-cover" src="{{asset('images/ekyy.jpg')}}" alt="user photo">
              </button>
              
            <div class="z-50 mr-5 my-6 text-base hidden list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown" style="margin-right:10px">
              <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 dark:text-white">{{Auth::user()->name}}</span>
                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{Auth::user()->email}}</span>
              </div>
              <ul class="py-2" aria-labelledby="user-menu-button">
                @if(Auth::user()->role == 'admin')
                <li>
                  <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                @elseif(Auth::user()->role === 'organizer')
                <li>
                    <a href="/organizer" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                @else
                <li>
                    <a href="/attendant" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                @endif
                <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" 
                    onclick="event.preventDefault(); 
                            if (confirm('Are you sure you want to logout?')) {
                                document.getElementById('logout-form').submit();
                            }">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
              </ul>
            </div>
            @endguest
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="{{asset('images/image-default.jpg')}}" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
          </button>
        </div>

        <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-user">
          <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="/home" class="block py-2 px-7 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page"> <i class="fas fa-home fa-fw"></i> Home</a>
            </li>
            <li>
              <a href="/events" class="block py-2 px-6 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"><i class="fas fa-calendar fa-fw"></i> Browse Events</a>
            </li>
            <li aria-labelledby="dropdownNavbarLink">
                <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" 
                        type="button" class="block py-2 px-6 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent 
                        md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 
                        dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                    <i class="fas fa-stream fa-fw"></i> Explore
                </button>
                <div id="doubleDropdown" 
                     class="hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                        <li>
                            <a href="/events?category=Concert-Music" class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-blue-600 dark:hover:text-blue-800">
                                <i class="fas fa-music fa-fw"></i> Concert-Music
                            </a>
                        </li>
                        <li>
                            <a href="/events?category=Trip-Camp" class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-blue-600 dark:hover:text-blue">
                                <i class="fas fa-campground fa-fw"></i> Trip-Camp
                            </a>
                        </li>
                        <li>
                            <a href="/events?category=Sport-Fitness" class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-blue-600 dark:hover:text-blue">
                                <i class="fas fa-futbol fa-fw"></i> Sport-Fitness
                            </a>
                        </li>
                        <li>
                            <a href="/events?category=Restaurant-Gastronomy" class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-blue-600 dark:hover:text-blue">
                                <i class="fas fa-utensils fa-fw"></i> Restaurant-Gastronomy
                            </a>
                        </li>
                        <li>
                            <a href="/events?category=Workshop-Training" class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-blue-600 dark:hover:text-blue">
                                <i class="fas fa-chalkboard-teacher fa-fw"></i> Workshop-Training
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            @auth
            <li>
              <a href="/dashboard/attendee/my-tickets" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"> <i class="fas fa-ticket-alt fa-fw"></i> My tickets</a>
            </li>
            <li>
              <a href="/dashboard/attendee/favorite-events" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"><i class="fas fa-calendar-plus fa-fw"></i> My Favorit Event</a>
            </li>
            @else
            <li>
              <a href="/attendant/login" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"> <i class="fas fa-ticket-alt fa-fw"></i> My tickets</a>
            </li>
            <li>
              <a href="/attendant/login" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"><i class="fas fa-calendar-plus fa-fw"></i> My Favorit Event</a>
            </li>
            @endauth
          </ul>
        </div>
        </div>
    </nav>

    @guest
    
    <div id="marketing-banner" tabindex="-1" class="fixed z-50 flex flex-col md:flex-row justify-between w-[calc(100%-2rem)] p-4 -translate-x-1/2 bg-white border border-gray-100 rounded-lg shadow-sm lg:max-w-7xl left-1/2 top-6 dark:bg-gray-700 dark:border-gray-600">
        <div class="flex flex-col items-start mb-3 me-4 md:items-center md:flex-row md:mb-0">
            <a href="https://flowbite.com/" class="flex items-center mb-2 border-gray-200 md:pe-4 md:me-4 md:border-e md:mb-0 dark:border-gray-600">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 me-2" alt="Flowbite Logo">
                <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <p class="flex items-center text-sm font-normal text-gray-500 dark:text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="flex items-center flex-shrink-0">
            <a href="/attendant/login" class="px-5 py-2 me-2 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign up</a>
            <button data-dismiss-target="#marketing-banner" type="button" class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    </div> 

    @endguest

    @yield('content')
    

<footer class=" z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    
    <footer class=" z-20 w-full bg-white border-t border-gray-200 shadow dark:bg-gray-800 dark:border-gray-600">
        <div class="max-w-screen-xl mx-auto p-6">
            <div class="md:flex md:items-start md:justify-between">
                <!-- Contact Us Form -->
                <div class="md:w-1/2 mb-6 md:mb-0">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Contact Us</h3>
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis accusamus similique omnis quam mollitia labore itaque! Excepturi, asperiores pariatur ea dolorem explicabo iure natus enim cupiditate similique, neque, dolore dicta? 
                        <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Privacy Policy</a>.
                    </p>
                    <form class="mt-4">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Message</label>
                        <textarea id="message" rows="4" class="block w-full p-2.5 mb-4 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                        <button type="submit" class="w-full md:w-auto px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Send
                        </button>
                    </form>
                </div>
    
                <!-- Footer Links -->
                <div class="md:w-1/2 md:text-right">
                    <span class="block mb-4 text-sm text-gray-500 dark:text-gray-400">
                        © 2024 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
                    </span>
                    <ul class="flex justify-center md:justify-end space-x-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <li>
                            <a href="#" class="hover:underline">About</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Licensing</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

        <script>
    $('#favorite-form').on('submit', function (e) {
    e.preventDefault(); // Mencegah pengiriman form secara tradisional
    
    var formData = $(this).serialize(); // Mengambil data form
    var button = $(this).find('button'); // Tombol yang ditekan
    
    $.ajax({
        url: $(this).attr('action'), // URL tujuan form
        type: $(this).attr('method'), // Metode POST
        data: formData, // Data form yang dikirim
        success: function(response) {
            if (response.status === 'added') {
                button.text(response.button_text).removeClass('add').addClass(response.button_class);
                alert(response.message);
            } else if (response.status === 'removed') {
                button.text(response.button_text).removeClass('rrr').addClass(response.button_class);
                alert(response.message);
            }
        },
        error: function() {
            alert('Terjadi kesalahan saat memproses favorit.');
        }
    });
});
        </script>
    </body>
</html>