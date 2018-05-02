<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mia 93.7</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Anton:n,b,i,bi|Basic:n,b,i,bi|Caudex:n,b,i,bi|Chelsea+Market:n,b,i,bi|Corben:n,b,i,bi|EB+Garamond:n,b,i,bi|Enriqueta:n,b,i,bi|Forum:n,b,i,bi|Fredericka+the+Great:n,b,i,bi|Jockey+One:n,b,i,bi|Josefin+Slab:n,b,i,bi|Jura:n,b,i,bi|Kelly+Slab:n,b,i,bi|Marck+Script:n,b,i,bi|Lobster:n,b,i,bi|Mr+De+Haviland:n,b,i,bi|Niconne:n,b,i,bi|Noticia+Text:n,b,i,bi|Overlock:n,b,i,bi|Patrick+Hand:n,b,i,bi|Play:n,b,i,bi|Sarina:n,b,i,bi|Signika:n,b,i,bi|Spinnaker:n,b,i,bi|Monoton:n,b,i,bi|Sacramento:n,b,i,bi|Cookie:n,b,i,bi|Raleway:n,b,i,bi|Open+Sans+Condensed:300:n,b,i,bi|Amatic+SC:n,b,i,bi|Cinzel:n,b,i,bi|Sail:n,b,i,bi|Playfair+Display:n,b,i,bi|Libre+Baskerville:n,b,i,bi|Roboto:n,b,i,bi|Roboto:n,b,i,bi|Work+Sans:n,b,i,bi|Work+Sans:n,b,i,bi|Poppins:n,b,i,bi|Poppins:n,b,i,bi|Barlow:n,b,i,bi|Barlow:n,b,i,bi|Oswald:n,b,i,bi|Oswald:n,b,i,bi|Cormorant+Garamond:n,b,i,bi|Cormorant+Garamond:n,b,i,bi|Playfair+Display:n,b,i,bi|Dancing+Script:n,b,i,bi|Damion:n,b,i,bi|Suez+One:n,b,i,bi|Rozha+One:n,b,i,bi|Raleway:n,b,i,bi|Lato:n,b,i,bi|Questrial:n,b,i,bi|&subset=latin-ext,cyrillic,japanese,korean,arabic,hebrew,latin" rel="stylesheet">

    @stack('head')
</head>
<body>

    <nav class="navbar navbar-toggleable-md navbar-mia">
        <div class="container px-5 ml-0 ml-sm-auto ml-md-auto ml-lg-auto">
            <div class="navbar-brand navbar-logo"></div>
            <div class="collapse navbar-collapse hidden-sm-down" id="mainnavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ (Request::is('home') ? 'active' : '') }}"><a class="nav-link" href="{{ route('home') }}">INICIO<span class="sr-only">(current)</span></a></li>
                    <li class="nav-item {{ (Request::is('pro') ? 'active' : '') }}"><a class="nav-link" href="{{ route('pro') }}">PROGRAMACION</a></li>
                    <li class="nav-item {{ (Request::is('staff') ? 'active' : '') }}"><a class="nav-link" href="{{ route('staff') }}">STAFF</a></li>
                    <li class="nav-item {{ (Request::is('cinema') ? 'active' : '') }}"><a class="nav-link" href="{{ route('cinema') }}">CINE</a></li>
                    <li class="nav-item {{ (Request::is('photos') ? 'active' : '') }}"><a class="nav-link" href="{{ route('photos') }}">FOTOS</a></li>
                    <li class="nav-item {{ (Request::is('the20') ? 'active' : '') }}"><a class="nav-link" href="{{ route('the20') }}">LOS 20+</a></li>
                </ul>
            </div>

        </div>
        <button class="navbar-toggler navbar-toggler-right inverse navbar-toggler-mia" type="button" data-toggle="collapse" data-target="#mainnavbar"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars open-menu-sm"></i>
        <i class="fa fa-close close-menu-sm"></i>
    </button>
    <div class="menu-sm">
        <ul class="navbar-nav d-flex align-items-center flex-column">
            <li class="nav-item {{ (Request::is('home') ? 'active' : '') }}"><a class="nav-link" href="{{ route('home') }}">INICIO<span class="sr-only">(current)</span></a></li>
            <li class="nav-item {{ (Request::is('pro') ? 'active' : '') }}"><a class="nav-link" href="{{ route('pro') }}">PROGRAMACION</a></li>
            <li class="nav-item {{ (Request::is('staff') ? 'active' : '') }}"><a class="nav-link" href="{{ route('staff') }}">STAFF</a></li>
            <li class="nav-item {{ (Request::is('cinema') ? 'active' : '') }}"><a class="nav-link" href="{{ route('cinema') }}">CINE</a></li>
            <li class="nav-item {{ (Request::is('photos') ? 'active' : '') }}"><a class="nav-link" href="{{ route('photos') }}">FOTOS</a></li>
            <li class="nav-item {{ (Request::is('the20') ? 'active' : '') }}"><a class="nav-link" href="{{ route('the20') }}">LOS 20+</a></li>
        </ul>
    </div>
</nav>
<div class="social-icons-container">
    <div class="row social-icons d-flex flex-column">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-youtube"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
    </div>
</div>

@yield('content')
@stack('scripts')
<script type="text/javascript">
    $(document).ready(function(){
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
</body>
</html>