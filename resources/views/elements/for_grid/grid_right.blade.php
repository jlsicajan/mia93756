<div class="row flex-column align-items-start mb-28px ml-0">
    <div class="grid-header col-12 {{ isset($classes) ? $classes : '' }}">
        <span class="font_2 color-white font_2_grid">{{ $title }}</span>
        @if(isset($gradient) && $gradient)
            <div class="gradient float-right"></div>
        @endif
    </div>
    <div class="grid-block bg-grid-default col-12">
        @if($grid_content['autor'] == 'Gthoy')
            <div class="img-cover p-2 article_grid_image" style="background-image: url('{{ $grid_content['imagen'] }}')">
            </div>
        @else
            <div class="img-cover p-2 article_grid_image" style="background-image: url('{{ env('URL_ARTICLE_PATH') . $grid_content['imagen'] }}')">
            </div>
        @endif
    	<p class="font_7">{{ $grid_content['titulo'] }}</p>
        <div class="article_content mb-1">
            {!! $grid_content['texto_uno'] !!}
        </div>

        <a class="color-primary" href="{{ route('article_one', $grid_content['id']) }}">Continuar leyendo</a>
    </div>
</div>