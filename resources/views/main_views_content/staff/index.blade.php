@if(!$hide_banner)
    @include('elements.mia-hdear', ['main_banner', $main_banner])
@endif
<div class="container">

    @if(!$hide_banner)
        @include('elements.for_grid.space_block_header', ['classes' => ''])

    @else
        @include('elements.for_grid.space_block_navbar', ['classes' => ''])
    @endif

    <div class="row">
        @foreach($staff_separated as $staff_item)
            <div class="col-12 col-sm-9 col-md-6 col-lg-6">
                @include('elements.staff.card_staff', ['image_url' => $staff_item['imagen'], 'card_title' => $staff_item['orden_mostrar'], 'card_text' => $staff_item['texto'], 'staff_id' => $staff_item['id'], 'staff_name' => $staff_item['locutor']])
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="staff_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var staffs = {!! json_encode($staff) !!};
    var users_blog = {!! json_encode($usuarios_blog) !!};
    $(document).ready(function () {
        console.log('all ready');
        var current_background = '{!! $main_background !!}';
        $('body').css('background-image', 'url(' + current_background + ')');

        let meta_title = 'El equipo';
        let meta_description = 'Radio mia 93.7 ' . meta_title;
        let meta_image = $('.navbar-logo').attr('data-logo-link');

        $('title').empty().text(meta_title);
        $('meta[property=\'og:title\']').attr('content', meta_title);

        $('meta[name=description]').attr('content', meta_description);
        $('meta[property=\'og:description\']').attr('content', meta_description);

        $('meta[property=\'og:image\']').attr('content', meta_image);
    });
</script>
<script src="/public/js/main_views/staff/staff.js"></script>
<script src="/public/js/nav_movements.js"></script>
