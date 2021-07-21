<div class=" max-w-5xl mx-auto">
    <div>
        <h3 class=" text-2xl font-medium">Products</h3>
    </div>

    <x-table-wrapper>
        <x-slot name="thead">
            <x-table-th-tr>
                <th>Code</th>
                <th>Name</th>
            </x-table-th-tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach ($products as $product)
            <x-table-tb-tr>
                <td>{{ $product->code }}</td>
                <td>{{ $product->name }}</td>
            </x-table-tb-tr>
                
            @endforeach
        </x-slot>

    </x-table-wrapper>
</div>
