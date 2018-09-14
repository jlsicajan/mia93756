<div class="card shadow">
    <div class="responsive-image card-img-top d-flex flex-column align-items-center justify-content-center" style="background-image: url('{{ env('URL_SOURCE') }}/uploads/staff/{{ $image_url }}')">
    	{{--<p class="color-white staff_name">{{ $staff_name }}</p>--}}
    </div>
    <div class="card-body">
        {{--<h5 class="card-title">{{ $card_title }}</h5>--}}
        <p class="card-text">{{ strip_tags($card_text) }}</p>
        <button class="btn btn-primary keep_reading" data-staff-id="{{ $staff_id }}" data-toggle="modal" data-target="#staff_modal">Seguir leyendo +</button>
    </div>
</div>