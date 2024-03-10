<x-main-layout>
    <form method="GET" action="{{ route('eventFilter') }}">

        <div class="flex items-center">
            <label for="category" class="block mr-2">Filter by Category:</label>
            <select name="category" id="category" class="border rounded-md p-1">
                <option value="">All</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded-md ml-2">Filter</button>
        </div>
    </form>

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">All Events</h1>
            <div class="p-4">
                <form class="flex items-center justify-between" action="{{ route('events.index') }}" method="GET">
                    <input type="text" name="query" placeholder="Search..." class="px-4 py-2 rounded-l-lg border border-gray-300 focus:outline-none focus:border-blue-500" value="{{ request('query') }}">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Search</button>
                </form>
            </div>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                @foreach ($events as $event)
                    <div class="lg:flex bg-slate-100 rounded-md text-black">
                        <img src="{{ asset('/images/' . $event->image) }}" class="w-full text-white" alt="Event Image" />
                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <li>
                                <a href="{{ route('eventShow', $event->id) }}" class="text-lg font-semibold text-black-800 hover:underline">{{ $event->title }}</a>
                            </li>
                            <p>Categories:</p>
                            <ul>
                                @foreach ($event->categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-main-layout>
