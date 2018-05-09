<div class="row flex-column @if($position == 'right') align-items-start ml-0 @else align-items-end @endif mb-28px">
    <div class="grid-photo-header col-12 {{ isset($classes) ? $classes : '' }}">
    </div>
    <div class="grid-block grid-photo-block bg-grid-default col-12" style="background-image: url('{{ env('URL_SOURCE_MULTIMEDIA_1') . $photo['nombre'] }}')">
     
    </div>
</div>
<style type="text/css">
	.grid-photo-block{
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>