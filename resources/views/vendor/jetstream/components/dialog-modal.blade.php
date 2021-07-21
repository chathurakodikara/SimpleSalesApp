@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="text-xl bg-gray-100 bg-opacity-70 px-8 pt-4 pb-3 font-semibold text-gray-600 text-center uppercase">
        {{ $title }}
    </div>
    <div class="px-8 py-4">

        <div>
            {{ $content }}
        </div>
    </div>

    <div class="px-8 py-4 bg-cool-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
