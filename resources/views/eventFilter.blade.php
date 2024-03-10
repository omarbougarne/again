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
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Filter</h1>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                @foreach ($events as $event)
                    <div class="lg:flex bg-slate-100 rounded-md text-black">
                        <img src="{{ asset('/images/' . $event->image) }}" class="w-full text-white" alt="Event Image" />
                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <h2 class="text-xl font-semibold text-gray-800 hover:underline">{{ $event->title }}</h2>
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
