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
                    <div class="flex items-center">
                        <a class="mr-2 text-blue-500 hover:text-blue-600 font-medium underline uppercase text-xs"
                            href="{{ route('playlists.edit', $item->slug) }}">Edit</a>
                        <div x-data="{ modalIsOpen: false }">
                            <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Are you sure ?">
                                <div class="flex items-center">
                                    <form class="mr-4" method="POST"
                                        action="{{ route('playlists.delete', $item->slug) }}">
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
                                href="{{ route('playlists.edit', $item->slug) }}">Delete</button>
                        </div>
                    </div>
                </x-td>
            </tr>
        @endforeach
    </x-table>

    {{ $playlists->links() }}
</x-app-layout>
