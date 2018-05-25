<div class="container">
    @include('elements.for_grid.space_block_header', ['classes' => ''])

    <div class="row mb-5">
        <div class="col-12">
            <h2 class="font_7 content_title">CUÉNTAME MÁS > ALFOMBRA ROSA</h2>
        </div>
    </div>
    <div class="row">
        @foreach($articles_gthoy as $article_gthoy)
            <div class="d-block col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-2">
                <button class="ajax_link text-no-decoration" data-href="{{ route('article_one', $article_gthoy['id']) }}">
                    <div class="multiple_article img-cover d-flex align-items-center flex-column justify-content-center p-2"
                         style="background-image: url('{{ $article_gthoy['imagen'] }}')">
                    </div>
                    <p class="color-primary font-weight-bold text-center">{{ $article_gthoy['titulo'] }}</p>
                </button>
            </div>
        @endforeach
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.ajax_link').unbind('click').click(function(){
            let load_page_ajax = get_path_ajax_to_load($(this));
            $('.ajax_link').removeClass('active');
            $(this).addClass('active');
            $('.footer').hide();
            // alert(load_page_ajax);

            clean_main_content_container(function () {
                console.log('done!');
                $('.footer').show();

            }, load_page_ajax);
        });

    });

</script>