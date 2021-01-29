<x-app-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="header">
        {{ $title }}
    </x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Title</x-th>
            <x-th>Action</x-th>
        </tr>

        @foreach ($videos as $index => $item)
            <tr class="hover:bg-gray-200">
                <x-td>{{ $index + $videos->firstItem() }}</x-td>
                <x-td>{{ $item->title }}</x-td>
                <x-td>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </x-td>
            </tr>
        @endforeach
    </x-table>

    {{ $videos->links() }}
</x-app-layout>
