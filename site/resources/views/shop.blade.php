@extends('layout')

@section('active2')

    active

@endsection

@section('maincontent')



    <section class="text-center my-4">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Notre boutique</h2>
                <!-- Section description -->
                <p class="card-text text-center">Bienvenue sur la boutique de votre BDE, vous trouverez grand nombre d'articles à votre disposition</p>
                <!-- Search form -->
                <div class="row justify-content-center">
                    <div class="md-form input-group col-md-2">
                        <input aria-label="Search" class="form-control" id="recherche" placeholder="Rechercher" type="text">
                        <div class="input-group-prepend">
                            <span class="input-group-text md-addon" id="material-addon-addon1"><a href="#" class="text-blue"><i class="fas fa-search"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Products v.1 -->



    <div class="container">
        <div class="row justify-content-center articles">

        </div>
    </div>



@endsection
