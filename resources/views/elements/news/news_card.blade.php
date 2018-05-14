<div class="row flex-column align-items-end mb-28px">
    <div class="card-secondary bg-grid-secondary col-12 d-flex flex-row news-container">
        <div class="col-12 h-100 news-slick d-flex align-items-center">
                @foreach($news as $new)
                    <div class="news_item d-flex flex-column align-items-center shadow text-center justify-content-center" style="background-image: url({{ $new['imagen'] }});">
                        <p class="color-white">NOTICIAS</p>
                        <p class="color-white">{{ $new['titulo'] }}</p>
                        <a class="btn btn-primary" target="_blank" href="{{ $new['link'] }}">Ver mas</a>
                    </div>
                @endforeach
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('.news-slick').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      // autoplay: true,
      // autoplaySpeed: 2000,
      dots: false,
      infinite: true,
      speed: 500,
      fade: true,
      cssEase: 'linear',
      prevArrow:"<button class='slick-prev'><i class='fa fa-arrow-left color-secondary' aria-hidden='true'></i></button>",
      nextArrow:"<button class='slick-next'><i class='fa fa-arrow-right color-secondary' aria-hidden='true'></i></button>"
    });
});

</script>
<style type="text/css">
    .news-container{
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .news_item{
        height: 224px;
        width: 160px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border: 5px solid white;
        box-shadow: -1px 2px 4px 0px rgba(0,0,0,0.5);
    }

    .bg-black{
        background-color: #000000;
    }

    .paff_title{
        font-weight: 300;
        margin-left: -20px;
        margin-top: 10px;
    }

    .paff_time{
        margin-left: -20px;
    }

    .paff_message{
        font-family: Arial;
        font-size: 28px;
        margin-left: -41px; /* quick solution :c*/
        padding-left: 20px;
    }

    .slick-prev, .slick-next{
        background: white;
        border: none;
        height: 30px;
        width: 30px;
        border-radius: 50%;
        cursor: pointer;
        opacity: .75;

    }
    .slick-list{
        margin-left: 10px;
        margin-right: 10px;
    }
</style>