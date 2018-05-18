<div class="row flex-column align-items-end mb-28px">
    <div class="grid-header grid-header-double col-12 {{ isset($classes) ? $classes : '' }}">
        <span class="font_2 font_2_grid_double color-white font_2_grid">{{ $title }}</span>
        @if(isset($gradient) && $gradient)
            <div class="gradient float-right"></div>
        @endif
    </div>
    <div class="grid-block grid-block-double bg-grid-default col-12">
        <p class="font_7">{{ $grid_content['titulo'] }}</p>
        <div class="article_content mb-1">
            {!! $grid_content['texto_uno'] !!}
        </div>
        <a class="color-primary" href="{{ route('article_one', $grid_content['id']) }}">Continuar leyendo</a>
    </div>
</div>