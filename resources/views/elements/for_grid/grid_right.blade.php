<div class="row flex-column align-items-start mb-28px ml-0">
    <div class="grid-header col-12 {{ isset($classes) ? $classes : '' }}">
        <span class="font_2 color-white font_2_grid"> {{ $title }}</span>
        @if(isset($gradient) && $gradient)
            <div class="gradient float-right"></div>
        @endif
    </div>
    <div class="grid-block bg-grid-default col-12">
        {!! $grid_content !!}
    </div>
</div>