<form method="GET" action="{{ route('events.index') }}"  class="space-y-6 dark:border-gray-700 dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Keyword -->
        <div class="flex flex-col space-y-2">
            <label for="keyword" class="text-sm font-medium text-gray-700">Keyword</label>
            <input type="text" name="keyword" id="keyword" 
                   class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                   placeholder="Enter keyword" value="{{ request('keyword') }}">
        </div>

        <!-- Category -->
        <div class="flex flex-col space-y-2">
            <label for="category" class="text-sm font-medium text-gray-700">Category</label>
            <select name="category" id="category" 
                    class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="" selected>All Categories</option>
                <option value="Trip/Camp" {{ request('category') == 'Trip/Camp' ? 'selected' : '' }}>Trip / Camp</option>
                <option value="Concert/Music" {{ request('category') == 'Concert/Music' ? 'selected' : '' }}>Concert / Music</option>
                <option value="Sport/Fitness" {{ request('category') == 'Sport/Fitness' ? 'selected' : '' }}>Sport / Fitness</option>
                <option value="Cinema" {{ request('category') == 'Cinema' ? 'selected' : '' }}>Cinema</option>
                <option value="Museum/Monument" {{ request('category') == 'Museum/Monument' ? 'selected' : '' }}>Museum / Monument</option>
                <option value="Recreation Park/Attraction" {{ request('category') == 'Recreation Park/Attraction' ? 'selected' : '' }}>Recreation Park / Attraction</option>
                <option value="Theater" {{ request('category') == 'Theater' ? 'selected' : '' }}>Theater</option>
                <option value="Restaurant/Gastronomy" {{ request('category') == 'Restaurant/Gastronomy' ? 'selected' : '' }}>Restaurant / Gastronomy</option>
                <option value="Workshop/Training" {{ request('category') == 'Workshop/Training' ? 'selected' : '' }}>Workshop / Training</option>
            </select>
        </div>

        <!-- Location -->
        <div class="flex flex-col space-y-2">
            <label for="location" class="text-sm font-medium text-gray-700">Location</label>
            <select name="location" id="location" 
                    class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="" selected>All Locations</option>
                <option value="online" {{ request('location') == 'online' ? 'selected' : '' }}>Online</option>
                <option value="offline" {{ request('location') == 'offline' ? 'selected' : '' }}>Offline</option>
            </select>
        </div>

        <!-- Date -->
        <div class="flex flex-col space-y-2">
            <label for="date" class="text-sm font-medium text-gray-700">Date</label>
            <select name="date" id="date" 
                    class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="" selected>All Dates</option>
                <option value="today" {{ request('date') == 'today' ? 'selected' : '' }}>Today</option>
                <option value="tomorrow" {{ request('date') == 'tomorrow' ? 'selected' : '' }}>Tomorrow</option>
                <option value="this_week" {{ request('date') == 'this_week' ? 'selected' : '' }}>This Week</option>
                <option value="next_week" {{ request('date') == 'next_week' ? 'selected' : '' }}>Next Week</option>
                <option value="next_month" {{ request('date') == 'next_month' ? 'selected' : '' }}>Next Month</option>
            </select>
        </div>
    </div>

    <!-- Buttons -->
        
        <button type="reset" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-red-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-red-700">Reset</button>



        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>

</form>
