@extends('layout')

@section('maincontent')

    <div class="card my-5">
        <div class="card-body">
            <h2 class="card-title text-center w-responsive mx-auto">Evènements à venir</h2>
            <p class="card-text text-center">Tous les évènements à venir sont listés ici</p>
        </div>
    </div>

    <div class="container my-5">
        <!-- Card -->
        <div class="card w-50 mx-auto">

            <!-- Card image -->
            <div class="view overlay">
                <img class="img-fluid" src="assets/img/skate.jpg" alt="Card image cap">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body">

                <!-- Title -->
                <h4 class="card-title">Card title</h4>
                <!-- Text -->
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <!-- Button -->
                <a href="#" class="btn btn-primary">Button</a>

            </div>

        </div>
        <!-- Card -->
    </div>

@endsection
