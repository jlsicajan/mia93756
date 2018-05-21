<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mia 93.7</title>
    <!-- Styles -->
    <link href="/public/css/app.css" rel="stylesheet">
    <link rel="icon" href="/public/img/logo/logo_white_background.jpg" type="image/jpg">

    <meta name="description" content="Escucha tu corazon">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="/public/js/app.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Anton:n,b,i,bi|Basic:n,b,i,bi|Caudex:n,b,i,bi|Chelsea+Market:n,b,i,bi|Corben:n,b,i,bi|EB+Garamond:n,b,i,bi|Enriqueta:n,b,i,bi|Forum:n,b,i,bi|Fredericka+the+Great:n,b,i,bi|Jockey+One:n,b,i,bi|Josefin+Slab:n,b,i,bi|Jura:n,b,i,bi|Kelly+Slab:n,b,i,bi|Marck+Script:n,b,i,bi|Lobster:n,b,i,bi|Mr+De+Haviland:n,b,i,bi|Niconne:n,b,i,bi|Noticia+Text:n,b,i,bi|Overlock:n,b,i,bi|Patrick+Hand:n,b,i,bi|Play:n,b,i,bi|Sarina:n,b,i,bi|Signika:n,b,i,bi|Spinnaker:n,b,i,bi|Monoton:n,b,i,bi|Sacramento:n,b,i,bi|Cookie:n,b,i,bi|Raleway:n,b,i,bi|Open+Sans+Condensed:300:n,b,i,bi|Amatic+SC:n,b,i,bi|Cinzel:n,b,i,bi|Sail:n,b,i,bi|Playfair+Display:n,b,i,bi|Libre+Baskerville:n,b,i,bi|Roboto:n,b,i,bi|Roboto:n,b,i,bi|Work+Sans:n,b,i,bi|Work+Sans:n,b,i,bi|Poppins:n,b,i,bi|Poppins:n,b,i,bi|Barlow:n,b,i,bi|Barlow:n,b,i,bi|Oswald:n,b,i,bi|Oswald:n,b,i,bi|Cormorant+Garamond:n,b,i,bi|Cormorant+Garamond:n,b,i,bi|Playfair+Display:n,b,i,bi|Dancing+Script:n,b,i,bi|Damion:n,b,i,bi|Suez+One:n,b,i,bi|Rozha+One:n,b,i,bi|Raleway:n,b,i,bi|Lato:n,b,i,bi|Questrial:n,b,i,bi|&subset=latin-ext,cyrillic,japanese,korean,arabic,hebrew,latin" rel="stylesheet">

    @yield('head')
</head>
<body>

    <nav class="navbar navbar-toggleable-md navbar-mia">
        <div class="container px-5 ml-0 ml-sm-auto ml-md-auto ml-lg-auto">
            <a class="navbar-brand navbar-logo" href="{{ route('home') }}"></a>
            <div class="collapse navbar-collapse hidden-sm-down" id="mainnavbar">
                <ul class="navbar-nav ml-auto">
                    @include('layouts.categories_menu')
                </ul>
            </div>

        </div>
        <button class="navbar-toggler navbar-toggler-right inverse navbar-toggler-mia" type="button" data-toggle="collapse" data-target="#mainnavbar"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars open-menu-sm"></i>
        <i class="fa fa-close close-menu-sm"></i>
    </button>
    <div class="menu-sm">
        {{--*/ $route = Request::route()->getName() /*--}}
        <ul class="navbar-nav d-flex align-items-center flex-column">
            @include('layouts.categories_menu')
        </ul>
    </div>
</nav>
<div class="social-icons-container">
    <div class="row social-icons d-flex flex-column">
        @foreach(App\SocialNetwork::orderBy('orden', 'ASC')->get()->toArray() as $social_network)
            <a class="mb-15px" href="{{ $social_network['link'] }}" target="_blank"><i class="fa fa-{{ strtolower($social_network['nombre']) }}"></i></a>
        @endforeach
    </div>
</div>

@yield('content')
@yield('scripts')
  <div class="container">
      @include('elements.for_grid.middle_space_block', ['classes' => ''])
  </div>
  <footer class="footer bg-grid-default">
      <div class="container center">
        <div class="row justify-content-center">
          <div class="col-12 col-md-12">
              <br>
              <p class="ml-2">© 2018. 937 Radio. Todos los derechos reservados. by <a class="color-primary" href="https://elcaminoweb.com.gt" target="_blank">El Camino Web.</a></p>
          </div>
          <div class="col-12 col-md-12 row">
               <ol class="breadcrumb bg-grid-default col-12 col-sm-8 col-md-9">
                <li class="breadcrumb-item"><a class="color-black {{ ($route == 'home') ? 'active' : '' }}" href="{{ route('home') }}">INICIO</a></li>
                <li class="breadcrumb-item"><a class="color-black {{ ($route == 'pro') ? 'active' : '' }}" href="{{ route('pro') }}">PROGRAMACION</a></li>
                <li class="breadcrumb-item"><a class="color-black {{ ($route == 'staff') ? 'active' : '' }}" href="{{ route('staff') }}">STAFF</a></li>
                <li class="breadcrumb-item"><a class="color-black {{ ($route == 'cinema') ? 'active' : '' }}" href="{{ route('cinema') }}">CINE</a></li>
                <li class="breadcrumb-item"><a class="color-black {{ ($route == 'photos') ? 'active' : '' }}" href="{{ route('photos') }}">FOTOS</a></li>
                <li class="breadcrumb-item"><a class="color-black {{ ($route == 'the20') ? 'active' : '' }}" href="{{ route('the20') }}">LOS 20+</a></li>
              </ol>
              <div class="row social-icons justify-content-around d-flex col-12 col-sm-4 col-md-3">
                @foreach(App\SocialNetwork::orderBy('orden', 'ASC')->get()->toArray() as $social_network)
                    <a href="{{ $social_network['link'] }}" target="_blank"><i class="fa fa-{{ strtolower($social_network['nombre']) }} color-black"></i></a>
                @endforeach
              </div>
          </div>
        </div>
      </div>
    </footer>
<script type="text/javascript">
    $(document).ready(function(){
        $( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function ( e ) {
            var $el = $( this );
            var $parent = $( this ).offsetParent( ".dropdown-menu" );
            if ( !$( this ).next().hasClass( 'show' ) ) {
                $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
            }
            var $subMenu = $( this ).next( ".dropdown-menu" );
            $subMenu.toggleClass( 'show' );

            $( this ).parent( "li" ).toggleClass( 'show' );

            $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
                $( '.dropdown-menu .show' ).removeClass( "show" );
            } );

            if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
                $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
            }

            return false;
        } );
    });
    $('.open-menu-sm').unbind('click').click(function(){
        $('.menu-sm').css('display', 'flex');
        $('.open-menu-sm').css('display', 'none');
        $('.close-menu-sm').css('display', 'block');
    });


    $('.close-menu-sm').unbind('click').click(function(){
        $('.menu-sm').css('display', 'none');
        $('.open-menu-sm').css('display', 'block');
        $('.close-menu-sm').css('display', 'none');
    });

</script>
<style type="text/css">
    .navbar-light .navbar-nav .nav-link {
        color: rgb(64, 64, 64);
    }
    .btco-menu li > a {
        padding: 10px 15px;
        color: #000;

    }

    .btco-menu .active a:focus,
    .btco-menu li a:focus ,
    .navbar > .show > a:focus{
        background: transparent;
        outline: 0;
    }


    .dropdown-menu .show > .dropdown-toggle::after{
        transform: rotate(-90deg);
    }
</style>
@yield('after_body')
</body>
</html>