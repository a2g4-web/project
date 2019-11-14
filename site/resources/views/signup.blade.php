@extends('layout')

@section('maincontent')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card mt-4">
                    <div class="card-body">
                        <div class="container">
                        <form action="/api/register" method="post">
                            <p class="h4 text-center">Sign up</p>

                            <div class="md-form">
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" id="lastName" name="last_name" class="form-control" placeholder="Nom">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" name="first_name" id="firstName" class="form-control" placeholder="Prénom">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                <input type="text" name="email" id="emailSignup" class="form-control" placeholder="Adresse Mail">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <input type="password" name="password" id="pwd1" class="form-control" placeholder="Mot de passe">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <input type="password" id="pwd2" class="form-control" placeholder="Confirmation">
                            </div>

                            <div class="md-form">
                                <i class="fa fa-map-marker-alt prefix grey-text" ></i>
                                <select class="browser-default custom-select col-md-11" name="location" id="campus">
                                    <option value="" disabled="" selected="">Séléctionner votre campus</option>
                                    @foreach($data as $d)
                                        <option value="{{$d['id']}}">{{$d['location']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-center py-4">
                                <button class="btn btn-elegant disabled" id="sbBtn" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection
