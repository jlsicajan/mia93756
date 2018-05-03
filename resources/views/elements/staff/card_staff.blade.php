<div class="card shadow">
    <img class="card-img-top img-responsive" src="{{ env('URL_SOURCE') }}/uploads/staff/{{ $image_url }}">
    <div class="card-body">
        {{--<h5 class="card-title">{{ $card_title }}</h5>--}}
        <p class="card-text">{{ strip_tags($card_text) }}</p>
    </div>
    <div class="card-footer">
        <button class="btn btn-outline-info">Seguir leyendo +</button>
    </div>
</div>