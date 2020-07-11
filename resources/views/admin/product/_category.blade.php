@foreach($categories as $categoryItem)
    <option value="{{ $categoryItem->id ?? '' }}"
        @isset($category->id)
            @if($category->parent_id == $categoryItem->id)
                selected=""
            @endif

            @if ($category->id == $categoryItem->id)
                disabled=""
            @endif
        @endisset
    >
{{--        {{ $delimiter ?? '' }}{{ $categoryItem->title ?? '' }}--}}
        {!! $delimiter ?? '' !!}{{ $categoryItem->title ?? '' }}
    </option>

    @isset($categoryItem->children)
        @include('admin.category._category', [
            'categories'    => $categoryItem->children,
            'delimiter'     => ' - ' . $delimiter
        ])
    @endisset
@endforeach
