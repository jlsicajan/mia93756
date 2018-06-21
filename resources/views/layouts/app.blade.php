<!DOCTYPE html>
<html lang="en" xmlns:expr="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ env('RADIO_URL') }}/public/img/logo/favicon.png" type="image/png">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="author" content="El Camino Web | https://www.elcaminoweb.com.gt ">

    <title>@yield('title')</title>
    <meta expr:content='@yield('title')' property='og:title'/>
    <meta property="og:title" content="@yield('title')" />

    <meta name="description" content="@yield('description')">
    <meta expr:content='@yield('description')' property='og:description'/>
    <meta property="og:description" content="@yield('description')" />

    <meta name="keywords" content="radiomia, mia937, radio mia fm, miaonline, mia937fm"/>
    <meta property="og:image" content="@yield('og_image')"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ env('RADIO_URL') }}/public/img/logo/favicon.png">

    <meta name="google-site-verification" content="X_7cDsfIpb0qSHwcjhAwzWuoNd7RMDkHOytvUB9H5ps"/>

    <!-- Styles -->
    <link href="/public/css/app.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Anton:n,b,i,bi|Basic:n,b,i,bi|Caudex:n,b,i,bi|Chelsea+Market:n,b,i,bi|Corben:n,b,i,bi|EB+Garamond:n,b,i,bi|Enriqueta:n,b,i,bi|Forum:n,b,i,bi|Fredericka+the+Great:n,b,i,bi|Jockey+One:n,b,i,bi|Josefin+Slab:n,b,i,bi|Jura:n,b,i,bi|Kelly+Slab:n,b,i,bi|Marck+Script:n,b,i,bi|Lobster:n,b,i,bi|Mr+De+Haviland:n,b,i,bi|Niconne:n,b,i,bi|Noticia+Text:n,b,i,bi|Overlock:n,b,i,bi|Patrick+Hand:n,b,i,bi|Play:n,b,i,bi|Sarina:n,b,i,bi|Signika:n,b,i,bi|Spinnaker:n,b,i,bi|Monoton:n,b,i,bi|Sacramento:n,b,i,bi|Cookie:n,b,i,bi|Raleway:n,b,i,bi|Open+Sans+Condensed:300:n,b,i,bi|Amatic+SC:n,b,i,bi|Cinzel:n,b,i,bi|Sail:n,b,i,bi|Playfair+Display:n,b,i,bi|Libre+Baskerville:n,b,i,bi|Roboto:n,b,i,bi|Roboto:n,b,i,bi|Work+Sans:n,b,i,bi|Work+Sans:n,b,i,bi|Poppins:n,b,i,bi|Poppins:n,b,i,bi|Barlow:n,b,i,bi|Barlow:n,b,i,bi|Oswald:n,b,i,bi|Oswald:n,b,i,bi|Cormorant+Garamond:n,b,i,bi|Cormorant+Garamond:n,b,i,bi|Playfair+Display:n,b,i,bi|Dancing+Script:n,b,i,bi|Damion:n,b,i,bi|Suez+One:n,b,i,bi|Rozha+One:n,b,i,bi|Raleway:n,b,i,bi|Lato:n,b,i,bi|Questrial:n,b,i,bi|&subset=latin-ext,cyrillic,japanese,korean,arabic,hebrew,latin"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
            integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
    <script src="/public/js/app.js"></script>
    <script src="/public/js/nav_movements.js"></script>
    @yield('head')
</head>
<body @if(isset($main_background) && !empty($main_background)) style="background-image: url({{ $main_background }})" @endif>
<div class="loading d-none">
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>
</div>
<nav class="navbar navbar-toggleable-md navbar-mia">
    <div class="container px-5 ml-0 ml-sm-auto ml-md-auto ml-lg-auto flex-column">
        <button class="ajax_link navbar-brand navbar-logo" data-logo-link="{{ env('URL_RADIO_INFO_PATH') . \App\Radio::get_logo() }}" data-href="{{ route('home') }}"
           style="background-image: url({{ env('URL_RADIO_INFO_PATH') . \App\Radio::get_logo() }})"></button>
        <div class="collapse navbar-collapse hidden-sm-down align-items-center justify-content-center" id="mainnavbar">
            <ul class="navbar-nav">
                @include('layouts.categories_menu')
            </ul>
        </div>

    </div>
    <button class="navbar-toggler navbar-toggler-right inverse navbar-toggler-mia" type="button" data-toggle="collapse"
            data-target="#mainnavbar"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars open-menu-sm"></i>
        <i class="fa fa-close close-menu-sm"></i>
    </button>
    <div class="menu-sm">
        {{--*/ $route = Request::route()->getName() /*--}}
        <ul class="navbar-nav d-flex align-items-center flex-column">
            @include('layouts.categories_menu_sm')
        </ul>
    </div>
</nav>
<div class="social-icons-container">
    <div class="row social-icons d-flex flex-column">
        @foreach(App\SocialNetwork::orderBy('orden', 'ASC')->get()->toArray() as $social_network)
            <a class="mb-15px" href="{{ $social_network['link'] }}" target="_blank"><i
                        class="fa fa-{{ strtolower($social_network['nombre']) }}"></i></a>
        @endforeach
    </div>
</div>

@yield('content')
<script type="text/javascript">
    var url_source_program = '{{ env('URL_SOURCE_PROGRAM') }}';
    var url_source = '{{  env('URL_SOURCE') }}';
</script>
@yield('scripts')
<div class="container">
    @include('elements.for_grid.middle_space_block', ['classes' => ''])
</div>
<footer class="footer bg-grid-default">
    <div class="container center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <br>
                <p class="ml-2">© 2018. 937 Radio. Todos los derechos reservados. by <a class="color-primary"
                                                                                        href="https://elcaminoweb.com.gt"
                                                                                        target="_blank">El Camino Web.</a></p>
            </div>
        </div>
    </div>
</footer>
@yield('after_body')
</body>
</html>