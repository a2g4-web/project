@extends('layout')

@section('maincontent')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card mt-4">
                    <div class="card-body">
                        <div class="container">
                        <form>
                            <p class="h4 text-center">Sign up</p>

                            <div class="md-form">
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" id="lastName" class="form-control" placeholder="Nom">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" id="firstName" class="form-control" placeholder="Prénom">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                <input type="text" id="email" class="form-control" placeholder="Adresse Mail">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <input type="password" id="pdw1" class="form-control" placeholder="Mot de passe">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <input type="password" id="pdw2" class="form-control" placeholder="Confirmation">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-map-marker-alt prefix grey-text" ></i>
                                <select class="browser-default custom-select col-md-11" id="campus">
                                    <option value="" disabled="" selected="">Séléctionner votre campus</option>
                                    <option value="1">Arras</option>
                                    <option value="2">Lille</option>
                                    <option value="3">Rouen</option>
                                </select>
                            </div>

                            <div class="text-center py-4">
                                <button class="btn btn-elegant" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection
