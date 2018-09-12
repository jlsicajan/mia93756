@include('elements.mia-hdear', ['main_banner', $main_banner])
<div class="container">
    @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
    @include('elements.for_grid.middle_space_block', ['classes' => ''])
    @include('elements.for_grid.middle_space_block', ['classes' => 'hidden-sm-down'])

    <div class="row">
        <?php 
            $content = DB::table('empresa')->where('id', env("RADIO_ID"))->select('texto_multimedia')->first();
        ?>
        @if (!is_null($content) && $content->texto_multimedia != '')
            <div class="col-sm-12 txt-col-12">
                <div class="text-center txt-big-mia p-2">
                    <h3>
                        {{ $content->texto_multimedia }}
                    </h3>
                </div>
            </div>
        @endif
    </div>

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
<style type="text/css">
    .bg-grid-secondary{
        background: linear-gradient(to bottom right, #bd3188, #e2008c) !important;
    }
</style>
<script src="/public/js/main_views/the20/the20.js"></script>
<script src="/public/js/nav_movements.js"></script>
