<x-app-layout>
    <x-slot name="title">
        Create new Playlist
    </x-slot>

    <x-slot name="header">
        Create new Playlist
    </x-slot>

    <form method="post" action="{{ route('playlists.create') }}" enctype="multipart/form-data" novalidate>
        @include('playlists._form-control', [
            'submit' => 'Create'
        ])
    </form>
</x-app-layout>