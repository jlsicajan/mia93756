<div class="row flex-column @if($position == 'right') align-items-start ml-0 @else align-items-end @endif mb-28px">
    <div class="grid-header col-12 {{ isset($classes) ? $classes : '' }}">
        <span class="font_2 color-white font_2_grid">{{ $movie['titulo'] }}</span>
        @if(isset($gradient) && $gradient)
        <div class="gradient float-right"></div>
        @endif
    </div>
    <div class="grid-block bg-grid-default col-12">
    	<div class="d-flex">
    		<div class="movie_image shadow" style="background-image: url('{{ env('URL_SOURCE_CINEMA') .  $movie['imagen'] }}')"></div>
    		<div class="d-flex flex-column p-3">
    			<p><strong class="color-primary">Dia</strong> {{ $movie['fecha_descripcion'] }}</p>
    			<p><strong class="color-primary">Sala</strong> {{ $movie['sala'] }}</p>
    			<p><strong class="color-primary">Hora</strong> {{ $movie['hora'] }}</p>
    			<p><strong class="color-primary">Lugar</strong> {{ $movie['location']['nombre'] }}</p>
    		</div>
    	</div>
    	<hr>
    	<div class="">
    		<p><strong class="color-primary">Sinopsis</strong></p>
    		<div>
    			{!! $movie['sinopsis'] !!}
    		</div>
    		<hr>
            <iframe class="embed-responsive-item" width="560" height="315" src="{{ str_replace(array('https://youtu.be/', 'https://www.youtube.com/watch?v='), 'https://youtube.be/embed/', $movie['url_youtube']) }}?rel=0&autoplay=0&autohide=2&border=0&wmode=opaque&enablejsapi=1&modestbranding=1&controls=0&showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <hr>
            <br>
        </div>
    </div>
</div>