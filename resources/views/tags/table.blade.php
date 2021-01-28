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
                <x-td>
                    <a class="mr-2 text-blue-500 hover:text-blue-600 font-medium underline uppercase text-xs"
                        href="{{ route('tags.edit', $item->slug) }}">Edit</a>
                </x-td>
            </tr>
        @endforeach
    </x-table>
</x-app-layout>
