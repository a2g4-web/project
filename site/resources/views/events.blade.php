@extends('layout')

@section('active3')

    active

@endsection

@section('maincontent')

    <div class="card my-4">
        <div class="card-body">
            <h2 class="card-title text-center w-responsive mx-auto">Evènements à venir</h2>
            <p class="card-text text-center">Tous les évènements à venir sont listés ici</p>
        </div>
    </div>

    <div class="container my-4">
        <div class="row justify-content-center events">

        </div>
    </div>

@endsection

@section('scripts')
<script src="/assets/js/events.js"></script>
@endsection
