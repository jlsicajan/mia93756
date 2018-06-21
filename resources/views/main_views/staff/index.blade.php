@extends('layouts.app')

@section('title', 'mia 93.7 el equipo')
@section('description', 'Radio mia 93.7 conoce al equipo')
@section('og_image', env('URL_RADIO_INFO_PATH') . \App\Radio::get_logo())

@section('content')
    <div class="main_content_container">
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
    </div>
    @include('elements.radio.live_radio_element')
    <script type="text/javascript">
        var staffs = {!! json_encode($staff) !!};
        var users_blog = {!! json_encode($usuarios_blog) !!};
    </script>
    <script src="/public/js/main_views/staff/staff.js"></script>
@endsection
