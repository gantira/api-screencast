<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="header">{{ $title }}</x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Playlist</x-th>
            <x-th>Action</x-th>
        </tr>
        @foreach ($tags as $index => $item)
            <tr class="hover:bg-gray-200">
                <x-td>{{ $index + $tags->firstItem() }}</x-td>
                <x-td>{{ $item->name }}</x-td>
                <x-td>{{ $item->playlists_count }}</x-td>
                <x-td>Edit</x-td>
            </tr>
        @endforeach
    </x-table>
</x-app-layout>
