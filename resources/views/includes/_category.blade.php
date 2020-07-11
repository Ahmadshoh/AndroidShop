@foreach($categories as $category)
    @if ($category->children->count())
        <li>
            <a href="{{ route('category', $category->alias) }}">{{ $category->title }}</a>
            <ul>
                @include('includes._category', ['categories' => $category->children, 'is_child' => true, 'parent_alias' => $category->alias])
            </ul>
        </li>
    @else
        @isset($is_child)
            <li><a href="{{ route('category_child', [$parent_alias, $category->alias]) }}">{{ $category->title }}</a></li>
            @continue
        @endisset
        <li><a href="{{ $category->alias }}">{{ $category->title }}</a></li>
    @endif
@endforeach
