<div {{ $attributes->merge(['class' => 'overflow-x-auto  w-full rounded bg-white border border-cool-gray-200 text-left ']) }} >
    <table class="table-auto border-collapse w-full ">
        <thead>
                {{ $thead }}
        </thead>

        <tbody>
                {{ $tbody }}
        </tbody>
    </table>

</div>