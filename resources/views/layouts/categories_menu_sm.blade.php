{{--*/ $route = Request::route()->getName() /*--}}
<li class="nav-item d-flex flex-column align-items-center justify-content-center">
    <button class="ajax_link_sm nav-link {{ ($route == 'home') ? 'active' : '' }}" data-href="{{ route('home') }}">INICIO</button>
</li>
@foreach(App\Category::list_for_menu() as $category)
    <li class="nav-item dropdown d-flex flex-column align-items-center justify-content-center">
        @if(empty($category['subcategories']))
            @if(isset($category['url']) && !empty($category['url']))
                <button class="ajax_link_sm nav-link {{ Request::is('contenido/' . $category['id'] . '/0' ) ? 'active' : '' }}"
                        data-href="{{ $category['url'] }}">
                    {{ $category['nombre'] }}
                </button>
            @else
                <button class="ajax_link_sm nav-link {{ Request::is('contenido/' . $category['id'] . '/0' ) ? 'active' : '' }}"
                        data-href="{{ route('content', [$category['id'], 0]) }}">
                    {{ $category['nombre'] }}
                </button>
            @endif
        @else
            <a class="nav-link dropdown-toggle" href="https://bootstrapthemes.co" id="categories_multimenu"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $category['nombre'] }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="categories_multimenu">
                @foreach($category['subcategories'] as $subcategory)
                    <li class="nav-item">
                        @if(isset($subcategory['url']) && !empty($subcategory['url']))
                            <button class="ajax_link_sm dropdown-item {{ Request::is('contenido/' . $category['id'] . '/' . $subcategory['id']) ? 'active' : '' }}"
                                    data-href="{{ $subcategory['url'] }}">
                                {{ $subcategory['nombre'] }}
                            </button>
                        @else
                            <button class="ajax_link_sm dropdown-item {{ Request::is('contenido/' . $category['id'] . '/' . $subcategory['id']) ? 'active' : '' }}"
                                    data-href="{{ route('content', [$category['id'], $subcategory['id']]) }}">
                                {{ $subcategory['nombre'] }}
                            </button>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach