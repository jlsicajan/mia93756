{{--*/ $route = Request::route()->getName() /*--}}
<li class="nav-item">
    <a class="nav-link {{ ($route == 'home') ? 'active' : '' }}" href="{{ route('home') }}">INICIO</a>
</li>
@foreach(App\Category::list_for_menu() as $category)
    <li class="nav-item dropdown">
        @if(empty($category['subcategories']))
            <a class="nav-link {{ Request::is('contenido/' . $category['id'] . '/0' ) ? 'active' : '' }}"
               href="{{ route('content', [$category['id'], 0]) }}">
                {{ $category['nombre'] }}
            </a>
        @else
            <a class="nav-link dropdown-toggle" href="https://bootstrapthemes.co" id="categories_multimenu"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $category['nombre'] }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="categories_multimenu">
                @foreach($category['subcategories'] as $subcategory)
                    <li class="nav-item">
                        <a class="dropdown-item {{ Request::is('contenido/' . $category['id'] . '/' . $subcategory['id']) ? 'active' : '' }}"
                           href="{{ route('content', [$category['id'], $subcategory['id']]) }}">
                            {{ $subcategory['nombre'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach