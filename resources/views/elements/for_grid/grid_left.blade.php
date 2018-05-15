<div class="row flex-column align-items-end mb-28px">
    <div class="grid-header col-12 {{ isset($classes) ? $classes : '' }}">
        <span class="font_2 color-white font_2_grid">{{ $title }}</span>
        @if(isset($gradient) && $gradient)
            <div class="gradient float-right"></div>
        @endif
    </div>
    <div class="grid-block bg-grid-default col-12">
    	<p class="font_7">{{ $title }}</p>
        <div class="article_content">
            {!! $grid_content['texto_uno'] !!}
        </div>
        <a class="color-primary" href="{{ route('article_one', $grid_content['id']) }}">Continuar leyendo</a>
    </div>
</div>