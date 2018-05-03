<div class="card shadow">
    <div class="responsive-image card-img-top" style="background-image: url('{{ env('URL_SOURCE') }}/uploads/staff/{{ $image_url }}')"></div>
    <div class="card-body">
        {{--<h5 class="card-title">{{ $card_title }}</h5>--}}
        <p class="card-text">{{ strip_tags($card_text) }}</p>
    </div>
    <div class="card-footer">
        <button class="btn btn-outline-info keep_reading" data-staff-id="{{ $staff_id }}" data-toggle="modal" data-target="#staff_modal">Seguir leyendo +</button>
    </div>
</div>