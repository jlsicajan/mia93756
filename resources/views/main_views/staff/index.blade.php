@extends('layouts.app')

@section('content')
    @include('elements.mia-hdear', ['title' => 'Staff'])
    <div class="container">
        @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
        @include('elements.for_grid.middle_space_block', ['classes' => ''])

        @foreach($staff as $staff_chunk)
            <div class="row justify-content-center">
            @foreach($staff_chunk as $staff_item)
                    <div class="col-12 col-sm-9 col-md-4 col-lg-4">
                        @include('elements.staff.card_staff', ['image_url' => $staff_item['imagen'], 'card_title' => $staff_item['orden_mostrar'], 'card_text' => $staff_item['texto']])
                    </div>
            @endforeach
            </div>
        @endforeach
    </div>
    <style type="text/css">
        .card{
            margin-bottom: 20px;
        }

        .card-body{
            max-height: 170px;
            padding: 20px;
            overflow: hidden;
        }
        .card-text{
            text-overflow: ellipsis;
            overflow: hidden;
            height: 75px;
        }
        .card-img-top{
            height: 170px;
        }
    </style>
@endsection
