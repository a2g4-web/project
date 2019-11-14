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

    @if(\App\User::getUser() != null && \App\User::getUser()['usertypeId'] == 2)
        <div class="btn-fix text-center">
            <a class="btn-floating btn-elegant btn-lg white-text"><i class="fas fa-plus mt-3"></i></a>
        </div>
    @endif

@endsection

@section('scripts')
<script src="/assets/js/events.js"></script>
@endsection
