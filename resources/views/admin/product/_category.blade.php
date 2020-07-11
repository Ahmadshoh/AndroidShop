@foreach($categories as $category)
    <option value="{{ $category->id ?? '' }}"
        @isset($product->id)
            @if($category->id == $product->category_id)
                selected
            @endif
        @endisset
    >

        {!! $delimiter ?? '' !!}{{ $category->title ?? '' }}
    </option>

    @isset($category->children)
        @include('admin.product._category', [
            'categories'    => $category->children,
            'delimiter'     => ' - ' . $delimiter
        ])
    @endisset
@endforeach
