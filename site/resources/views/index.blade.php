@extends('layout')

@section('maincontent')
<div class="card my-4 animated fadeInLeft">
    <div class="card-body text-center">
        <h1 class="card-title">Votre BDE</h1>
        <p class="card-text">Votre BDE vous propose une boutique eev</p>
    </div>
</div>

<div class="card my-4 animated fadeInRight">
    <div class="card-body text-center">
        <h2 class="card-title mb-5">Titre</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
        </div>
    </div>
</div>
@endsection
