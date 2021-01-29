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
            <x-th>Intro</x-th>
            <x-th>Action</x-th>
        </tr>

        @foreach ($videos as $index => $item)
            <tr class="hover:bg-gray-200">
                <x-td>{{ $index + $videos->firstItem() }}</x-td>
                <x-td>{{ $item->title }}</x-td>
                <x-td>
                    <span class="uppercase font-semibold text-xs">{{ $item->intro ? 'Yes' : 'No' }}</span>
                </x-td>
                <x-td>
                    <a class="text-blue-500 hover:text-blue-600 font-medium underline uppercase text-xs"
                        href="{{ route('videos.edit', [$playlist, $item->unique_video_id]) }}">Edit</a>
                    <a class="text-blue-500 hover:text-blue-600 font-medium underline uppercase text-xs"
                        href="#">Delete</a>
                </x-td>
            </tr>
        @endforeach
    </x-table>

    {{ $videos->links() }}
</x-app-layout>
