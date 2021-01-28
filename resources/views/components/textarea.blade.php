<textarea
    {{ $attributes->merge(['class' => "block mt-1 w-full border border-gray-300 focus:border-blue-500 focus:outline-none rounded-lg focus:ring focus:ring-blue-200"]) }}>{{ $slot }}
</textarea>
