@extends('layouts.app')

@section('head')
@endsection

@section('content')
<div class="container-fluid mia-header" style="background-image: url({{ $header_path }});">
    <div class="row justify-content-start">
        <div class="col-md-3 d-flex flex-column justify-content-center">
            <div class="title-container border-bottom-white border-top-white">
                <h3 class="color-white display-2 font_3">Escucha</h3>
                <h3 class="color-white display-2 font_3">Tu</h3>
                <h3 class="color-white display-2 font_3">Corazon</h3>
            </div>
        </div>
        <div class="col-md-9"></div>
    </div>
</div>
<div class="container">
    @include('elements.for_grid.space_block', ['classes' => 'hidden-sm-down'])
    @include('elements.for_grid.middle_space_block', ['classes' => ''])
    @include('elements.for_grid.middle_space_block', ['classes' => 'hidden-sm-down'])

    <div class="row">
        <div class="col-12">
           <h3 class="color-primary">{{ $article['titulo'] }}</h3>
           <hr>
           <p>{!! $article['texto_uno'] !!}</p>
           <strong>Visitas: {{ $article['visitas'] }}</strong>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="fb-comments" data-href="http://mia937.elcaminoweb.com/articulo/{{ $article['id'] }}" data-width="100%" data-numposts="5"></div>
        </div>  
    </div>
 
</div>
@endsection

@section('after_body')
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=1765073390470250&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('iframe').each(function(){
            $(this).css('width', '100%');
        });
    });
</script>
@endsection