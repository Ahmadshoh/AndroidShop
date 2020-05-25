@foreach($categories as $category)
    @if ($category->children->count())
        <li>
            <a href="{{ $category->alias }}">{{ $category->name }}</a>
            <ul>
                @include('includes._category', ['categories' => $category->children, 'is_child' => true])
            </ul>
        </li>
    @else
        @isset($is_child)
            <li><a href="{{ $category->alias }}">{{ $category->name }}</a></li>
            @continue
        @endisset
        <li><a href="{{ $category->alias }}">{{ $category->name }}</a></li>
    @endif
@endforeach
