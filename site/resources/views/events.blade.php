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
            <a class="btn-floating btn-elegant btn-lg white-text" href="#" data-toggle="modal" data-target="#centralModalLg"><i class="fas fa-plus mt-3"></i></a>
        </div>
    @endif

    <!-- Central Modal Small -->
    <div class="modal fade" id="centralModalLg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Ajout évènement</h4>

                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="md-form" action="/api/addevent" enctype="multipart/form-data" method="POST" id="eventForm">
                            <p class="h4 text-center">Ajouter un évènement</p>
                            <div class="md-form">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom de l'évènement">
                            </div>
                            <div class="md-form">
                                <input type="text" id="description" name="description" class="form-control" placeholder="Description de l'évènement">
                            </div>
                            <div class="md-form">
                                <input type="text" id="location" name="location" class="form-control" placeholder="Lieu de l'évènement">
                            </div>
                            <div class="md-form">
                                <input type="text" id="date" name="date" class="form-control" placeholder="Date de l'évènement">
                            </div>
                            <div class="md-form">
                                <input type="text" id="price" name="price" class="form-control" placeholder="Prix de l'évènement">
                            </div>
                            <div class="file-field">
                                <div class="btn btn-primary">
                                    <span id="addFile">Ajouter une image</span>
                                    <input type="file" name="fileInput" id="fileInput" hidden>
                                </div>
                                <p id="fileName"></p>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary btn-sm" id="formSend">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Central Modal Small -->

@endsection

@section('scripts')
<script src="/assets/js/events.js"></script>
@endsection
