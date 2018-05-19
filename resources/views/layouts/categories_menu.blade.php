{{--*/ $route = Request::route()->getName() /*--}}
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="https://bootstrapthemes.co" id="categories_multimenu"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        SUB CATEGORIAS
    </a>
    <ul class="dropdown-menu" aria-labelledby="categories_multimenu">
        @foreach(App\Category::list_for_menu() as $category)
            @if(empty($category['subcategories']))
                {{--<li><a class="dropdown-item" href="{{ route('content', [$category['id'], 0]) }}">{{ $category['nombre'] }}</a></li>--}}
            @else
                <li><a class="dropdown-item dropdown-toggle" href="#">{{ $category['nombre'] }}</a>
                    <ul class="dropdown-menu">
                        @foreach($category['subcategories'] as $subcategory)
                            <li><a class="dropdown-item"
                                   href="{{ route('content', [$category['id'], $subcategory['id']]) }}">{{ $subcategory['nombre'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
</li>
@foreach(App\Category::list_for_menu() as $category)
    <li class="nav-item">
        <a class="nav-link {{ ($route == 'content') ? 'active' : '' }}" href="{{ route('content', [$category['id'], 0]) }}">{{ $category['nombre'] }}</a>
    </li>
@endforeach