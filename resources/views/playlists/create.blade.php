<x-app-layout>
    <x-slot name="title">
        Create new Playlist
    </x-slot>

    <form method="post" action="{{ route('playlists.create') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <input type="file" name="thumbnail" id="thumbnail">
        </div>

        <div class="mb-6">
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="name" name="name" :value="old('name')" required
                autofocus />
        </div>

        <div class="mb-6">
            <x-label for="price" :value="__('Price')" />

            <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
        </div>

        <div class="mb-6">
            <x-label for="description" :value="__('Description')" />

            <x-textarea id="description" name="description" required>{{ old('description') }}</x-textarea>
        </div>

        <x-button>Create</x-button>
    </form>
</x-app-layout>