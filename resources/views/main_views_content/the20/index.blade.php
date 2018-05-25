<div class="container">
    @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
    @include('elements.for_grid.middle_space_block', ['classes' => ''])
    @include('elements.for_grid.middle_space_block', ['classes' => 'hidden-sm-down'])

    <div class="row justify-content-center">
        @foreach($the20 as $plus)
            @if(!empty($plus['audio']) && !empty($plus['imagen']))
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    @include('elements.the20.simple_player', ['gradient' => 1, 'music' => $plus])
                </div>
            @endif
        @endforeach
    </div>
</div>
<script src="/public/js/main_views/the20/the20.js"></script>