@extends('layout')

@section('maincontent')
   <div class="card my-4 animated fadeInLeft">
        <div class="card-body text-center">
            <h1 class="card-title">Votre BDE</h1>
            <p class="card-text">Votre BDE vous propose une boutique ainsi que des évenements</p>
        </div>
    </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
    <div class="card my-4 animated fadeInRight mx-5">
        <div class="card-body text-center">
            <h2 class="card-title">Evenements</h2>
            <p class="card-text">Quelques photos des évenements précédents !</p>

            <div class="container container_carousel">
                <div class="carousel">
                    <div class="item a">Barbecue<img src="/assets/img/img_carousel/barbecue_c.jpg"></div>
                    <div class="item b">Canoe <img src="/assets/img/img_carousel/canoe_c.jpg"></div>
                    <div class="item c">Challenge Watson<img src="/assets/img/img_carousel/challenge_watson_c.jpg"></div>
                    <div class="item d">Course Solidaire<img src="/assets/img/img_carousel/course_solidaire_c.jpg"></div>
                    <div class="item e">Don du Sang<img src="/assets/img/img_carousel/don_du_sang_c.jpg"></div>
                    <div class="item f">Portes ouvertes<img src="/assets/img/img_carousel/portes_ouvertes_c.jpg"></div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <div class="col-md-6">
    <div class="card my-4 animated fadeInLeft mx-5">
        <div class="card-body text-center">
            <h2 class="card-title">Boutique</h2>
            <p class="card-text">Quelques articles en ventes dans notre boutique !</p>

            <div class="container container_carousel">
                <div class="carousel">
                    <div class="test a">Coque d'Iphone <img src="assets/img/img_carousel/coque_c.jpg"></div>
                    <div class="test b">Badges x5<img src="assets/img/img_carousel/badges_c.jpg"></div>
                    <div class="test c">Mug <img src="assets/img/img_carousel/mug_c.jpg"></div>
                    <div class="test d">Sac <img src="assets/img/img_carousel/sac_c.jpg"></div>
                    <div class="test e">Pull <img src="assets/img/img_carousel/pull_c.jpg"></div>
                    <div class="test f">Tapis de souris <img src="assets/img/img_carousel/gourde_c.jpg"></div>
                </div>
            </div>
        </div>
    </div>
        </div>
        </div>

</div>




    <!--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/img/barbecue.jpg" class="w-50" alt="barbecue">
        </div>
        <div class="carousel-item">
            <img src="assets/img/canoe.jpg" class="w-50" alt="canoe">
        </div>
        <div class="carousel-item">
            <img src="assets/img/skate.jpg" class="w-50" alt="skate">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>-->
@endsection
