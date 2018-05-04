@if(isset($custom_background))
<div class="container-fluid mia-header" style="background-image: url('{{ env('URL_SOURCE_PROGRAM') . $custom_background  }}')"">
  <div class="row justify-content-start">
        <div class="col-md-4 d-flex flex-column justify-content-center">
            <div class="title-container border-bottom-white border-top-white py-3">
                <h3 class="color-white display-2 font_3">{{ $title }}</h3>
            </div>
            <p class="color-white">{{ $custom_subtitle }}</p>
        </div>
        <div class="col-md-8"></div>
    </div>
</div>
@else
<div class="container-fluid mia-header">
  <div class="row justify-content-start">
        <div class="col-md-4 d-flex flex-column justify-content-center">
            <div class="title-container border-bottom-white border-top-white py-3">
                <h3 class="color-white display-2 font_3">{{ $title }}</h3>
            </div>
        </div>
        <div class="col-md-8"></div>
    </div>
</div>
@endif
  