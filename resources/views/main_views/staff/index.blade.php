@extends('layouts.app')

@section('content')
    @include('elements.mia-hdear', ['title' => 'Staff'])
    <div class="container">
        @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
        @include('elements.for_grid.middle_space_block', ['classes' => ''])
        
        @foreach($staff_separated as $staff_chunk)
            <div class="row justify-content-center">
                @foreach($staff_chunk as $staff_item)
                    <div class="col-12 col-sm-9 col-md-4 col-lg-4">
                        @include('elements.staff.card_staff', ['image_url' => $staff_item['imagen'], 'card_title' => $staff_item['orden_mostrar'], 'card_text' => $staff_item['texto'], 'staff_id' => $staff_item['id']])
                    </div>
                @endforeach
            </div>
        @endforeach
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
    <style type="text/css">
        /*Just for the moment, this should be moved to an scss file in a respective asset folder*/
        .keep_reading {
            cursor: pointer;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-body {
            max-height: 170px;
            padding: 20px;
            overflow: hidden;
        }

        .card-text {
            text-overflow: ellipsis;
            overflow: hidden;
            height: 75px;
        }

        .card-img-top {
            height: 250px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <script type="text/javascript">
      var staffs = {!! json_encode($staff) !!};
      var users_blog = {!! json_encode($usuarios_blog) !!};

      $('.keep_reading').unbind('click').click(function () {
        let staff_id = $(this).attr('data-staff-id');
        let staff_selected = staffs.find(st => st.id == staff_id);
        console.warn(staff_selected);
        let user_selected = users_blog.find(us => us.id == staff_selected.usuario_id);


        console.log(users_blog);
        console.log(user_selected);
        $('#staff_modal .modal-body').empty().html(staff_selected['texto']);
        $('#staff_modal .modal-title').empty().html(user_selected['nombre_completo']);
        console.log(staff_selected['texto']);
      });
    </script>
@endsection
