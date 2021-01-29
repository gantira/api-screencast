<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="header">{{ $title }}</x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Playlist</x-th>
            @can('delete tags')
                <x-th>Action</x-th>
            @endcan
        </tr>
        @foreach ($tags as $index => $item)
            <tr class="hover:bg-gray-200">
                <x-td>{{ $index + $tags->firstItem() }}</x-td>
                <x-td>{{ $item->name }}</x-td>
                <x-td>{{ $item->playlists_count }}</x-td>
                @can('delete tags')
                    <x-td>
                        <div class="flex items-center">
                            <a class="mr-2 text-blue-500 hover:text-blue-600 font-medium underline uppercase text-xs"
                                href="{{ route('tags.edit', $item->slug) }}">Edit</a>

                            <div x-data="{ modalIsOpen: false }">
                                <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Are you sure ?">
                                    <div class="flex items-center">
                                        <form class="mr-4" method="POST" action="{{ route('tags.delete', $item->slug) }}">
                                            @csrf
                                            @method('delete')

                                            <x-button>
                                                Yes
                                            </x-button>
                                        </form>
                                        <x-button type="button" @click="modalIsOpen = false">Nope</x-button>
                                    </div>
                                </x-modal>

                                <button @click="modalIsOpen = true"
                                    class="focus:outline-none text-red-500 hover:text-red-600 font-medium underline uppercase text-xs"
                                    href="{{ route('tags.edit', $item->slug) }}">Delete</button>
                            </div>

                        </div>
                    </x-td>
                @endcan
            </tr>
        @endforeach
    </x-table>
</x-app-layout>
