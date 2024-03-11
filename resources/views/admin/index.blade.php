<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users') }}
            </h2>
        </div>
    </x-slot>
    @role('admin')
    @php
        $userCount = \App\Models\User::count();
        $activeUserCount = \App\Models\User::whereNull('deleted_at')->count();
        $categoryCount = \App\Models\Category::count();
        $eventCount = \App\Models\Event::count();
        $reservationCount = \App\Models\Attending::count();
    @endphp
     <div class=" grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <div class="p-4 relative bg-white shadow rounded-lg overflow-hidden">
            <div class="absolute bg-indigo-500 rounded-md p-3">
            </div>
            <p class="ml-16 mt-2 text-sm font-medium text-gray-500 truncate">Total Users</p>
            <div class="ml-16 flex items-baseline mt-1">
                <p class="text-2xl font-semibold text-gray-900">{{ $userCount }}</p>
                <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                    <span class="sr-only"> Increased by </span>
                    122
                </p>
            </div>
        </div>
        <br>
        <div class=" relative bg-white shadow rounded-lg overflow-hidden">
            <div class="absolute bg-indigo-500 rounded-md p-3">
            </div>
            <p class="ml-16 mt-2 text-sm font-medium text-gray-500 truncate">Total Events</p>
            <div class="ml-16 flex items-baseline mt-1">
                <p class="text-2xl font-semibold text-gray-900">{{ $eventCount }}</p>
                <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                    <span class="sr-only"> Increased by </span>
                    5.4%
                </p>
            </div>
        </div>
        <br>
        <div class="p-4 relative bg-white shadow rounded-lg overflow-hidden">
            <div class="absolute bg-indigo-500 rounded-md p-3">
            </div>
            <p class="ml-16 mt-2 text-sm font-medium text-gray-500 truncate">Total Reservations</p>
            <div class="ml-16 flex items-baseline mt-1">
                <p class="text-2xl font-semibold text-gray-900">{{ $reservationCount }}</p>
                <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                    <span class="sr-only"> Increased by </span>
                    20
                </p>
            </div>
        </div>
    </div>
    <br>
    <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
        <div>
            <div class="absolute bg-indigo-500 rounded-md p-3">
            </div>
            <p class="ml-16 mt-2 text-sm font-medium text-gray-500 truncate">Total Category</p>
        </div>
        <div class="ml-16 pb-6 flex items-baseline sm:pb-7">
            <p class="text-2xl font-semibold text-gray-900">{{ $categoryCount }}</p>
            <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                <span class="sr-only"> Increased by </span>
                20
            </p>
        </div>
    </div>
    <br>

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-semibold mb-4 text-white">User Management</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-200">Name</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-200">Email</th>
                        <th class="px-4 py-2 bg-gray-100 border-b border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if (!$user->hasRole('admin'))
                        <tr>
                            <td class="px-4 py-2 border-b border-gray-200 text-white">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-b border-gray-200 text-white">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b border-gray-200 text-white">
                                <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-500 hover:bg-red-600 py-1 px-3 rounded focus:outline-none focus:shadow-outline" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endrole
</x-app-layout>
