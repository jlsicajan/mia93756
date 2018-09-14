@if(isset($youtube_url))
    <div class="container-fluid">
        <div class="row">
            <div id="carousel_main_banner" class="carousel slide z-2" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="mia-header">
                            <iframe class="embed-responsive-item" width="100%" height="100%"
                                    src="{{ str_replace(array('https://youtu.be/', 'https://www.youtube.com/watch?v='), 'https://youtube.be/embed/', $youtube_url) }}?rel=0&autoplay=0&autohide=2&border=0&wmode=opaque&enablejsapi=1&modestbranding=1&controls=1&showinfo=0"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container-fluid mia-header"
         style="background-image: url({{ $main_banner }}); position: absolute !important;">
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
<style type="text/css">
    .carousel {
        position: absolute !important;
        width: 100%;
    }
</style>
