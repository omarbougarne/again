<!-- restore.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restore User') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Restore User</h2>
            @foreach ($users  as $user)
            <td class="px-4 py-2 border-b border-gray-200 text-white">{{ $user->name }}</td>
            <td class="px-4 py-2 border-b border-gray-200 text-white">{{ $user->email }}</td>
            <p class="mb-4">Are you sure you want to restore this user?</p>
            <form action="{{ route('admin.restoreByUrl', $userId) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Restore User</button>
            </form>
            @endforeach
        </div>
    </div>
</x-app-layout>
