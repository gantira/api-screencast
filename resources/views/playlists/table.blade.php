<x-app-layout>
    <x-slot name="title">
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
            <tr>
                <x-td>{{ $index + $playlists->firstItem() }}</x-td>
                <x-td>{{ $item->name }}</x-td>
                <x-td>{{ $item->created_at->format('d F, Y') }}</x-td>
                <x-td>
                    <a href="#">Edit</a>
                </x-td>
            </tr>
        @endforeach
    </x-table>


    {{ $playlists->links() }}
</x-app-layout>