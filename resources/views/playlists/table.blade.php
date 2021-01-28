<x-app-layout>
    <x-slot name="title">
        Your Playlist
    </x-slot>

    <x-slot name="header">
        Your Playlist
    </x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Published</x-th>
            <x-th>Action</x-th>
        </tr>

        @foreach ($playlists as $index => $item)
            <tr class="hover:bg-gray-200">
                <x-td>{{ $index + $playlists->firstItem() }}</x-td>
                <x-td>{{ $item->name }}</x-td>
                <x-td>{{ $item->created_at->format('d F, Y') }}</x-td>
                <x-td>
                    <a class="text-blue-500 hover:text-blue-600 font-medium underline uppercase text-xs" href="{{ route('playlists.edit', $item->slug) }}">Edit</a>
                </x-td>
            </tr>
        @endforeach
    </x-table>

    {{ $playlists->links() }}
</x-app-layout>
