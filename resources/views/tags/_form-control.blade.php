@csrf

<div class="mb-4 w-full lg:w-1/2">
    <x-label for="name">Name</x-label>
    <x-input type="text" name="name" id="name" class="mt-2 w-full" placeholder="Laravel" :value="old('name') ?? $tag->name" />
</div>


<x-button>{{ $submit }}</x-button>
