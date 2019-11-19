@extends('layout')

@section('maincontent')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card mt-4">
                    <div class="card-body">
                        <div class="container">
                            <form action="/api/register" method="post"> <!--Form to enter the information to register-->
                                <p class="h4 text-center">Se connecter</p>

                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" id="lastName" name="last_name" class="form-control" placeholder="Nom"> <!--Input of the lastname-->
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" name="first_name" id="firstName" class="form-control" placeholder="Prénom"> <!--Input of the firstname-->
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="text" name="email" id="emailSignup" class="form-control" placeholder="Adresse Mail"> <!--Input of the email address-->
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" name="password" id="pwd1" class="form-control" placeholder="Mot de passe"> <!--Input for the password-->
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" id="pwd2" class="form-control" placeholder="Confirmation"> <!--Input to confirm the password-->
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-map-marker-alt prefix grey-text" ></i>
                                    <select class="browser-default custom-select col-md-11" name="location" id="campus"> <!--Dropdown list to choose the campus-->
                                        <option value="" disabled="" selected="">Séléctionner votre campus</option>
                                        @foreach($data as $d)
                                            <option value="{{$d['id']}}">{{$d['location']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2 custom-control custom-checkbox text-center">
                                    <input type="checkbox" class="form-check-input custom-control-input" id="conditions" name="conditions">  <!--Ckeckbox to accepte the conditions-->
                                    <label for="conditions" class="custom-control-label">Accepter les <a href="/cgv">conditions</a></label>
                                </div>

                                <div class="text-center py-4">
                                    <button class="btn btn-elegant disabled" id="sbBtn" type="submit">Register</button> <!--Button to submit the form-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="/assets/js/signup.js"></script>
@endsection
