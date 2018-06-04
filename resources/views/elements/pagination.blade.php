<div class="row">
    <div class="col-12">
        <ul class="pagination">
            <li class="page-item">
                <button type="button" class="page-link"><span class="color-primary" aria-hidden="true">&laquo;</span></button>
            </li>
            @for($x = 0; $x < $size; $x++)
                <li class="page-item mia-page-item {{ $x == 0 ? 'active' : '' }}">
                    <button type="button" data-pag="{{ $x }}" class="page-link mia-page-link pagination_button">{{ $x + 1 }}</button>
                </li>
            @endfor
            <li class="page-item">
                <button type="button" class="page-link"><span class="color-primary" aria-hidden="true">&raquo;</span></button>
            </li>
        </ul>
    </div>
</div>