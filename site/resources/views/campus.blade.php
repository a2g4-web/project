@extends('layout')

@section('active1')

    active

@endsection

@section('maincontent')

    <div class="card my-4 text-center">
        <div class="card-body">
            <h2 class="card-title">Présence du CESI sur le territoire</h2>
        </div>
    </div>

    <div class="card my-4 text-center">
        <div class="card-body text-center">
            <h2 class="card-title">Carte des implémentations</h2>
            <div class="card-body text-left">
                <h5>CESI c'est <strong>25 campus</strong>, répartis sur toute le territoire français, pour :</h5>
                <ul>
                    <li>Être proche des entreprises et des salariés partout en France.</li>
                    <li>Créer des liens forts avec les sociétés, les organisations et les institutions locales et nationales.</li>
                    <li>Suivre un cursus sur-mesure, en mobilité, n’importe où en France.</li>
                </ul>
            </div>
            <div class="box">
                <div class="card-body">
                <img src="assets/carte.png" alt="carte" class="w-40 img-fluid">
                </div>
                <div class="card-body col-md-4">
                    <h1 class="card-title">+ de 1500 formations & modules sont enseignés sur nos 25 campus</h1>
                </div>
            </div>
    </div>
    </div>



@endsection
