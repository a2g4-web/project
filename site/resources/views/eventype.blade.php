@extends('layout')

@section('maincontent')

    <div class="card my-4 text-center">
        <div class="container-fluid mb-3">
            <div class="card-body">
                <div class="row float-left" style="width: 250px; height: auto;">
                    <a class="event-header" href="#" data-toggle="modal" data-target="#centralModalLg">

                    </a>
                </div>
                <div class="row">
                    <div class="offset-md-3 col-md-4">
                        <h2 class="card-title">{{$data['name']}}</h2><br>
                    </div>
                    <div class="offset-md-2 col-md-3">
                        @if(\App\User::getUser() != null)
                            @if($participate == false)
                                <a href="/api/registerevent/{{$data['id']}}" class="btn btn-primary btn-elegant">Inscription</a>
                            @else
                                <a href="/api/unregisterevent/{{$data['id']}}" class="btn btn-primary btn-elegant">Se désinscrire</a>
                            @endif
                        @else
                            <a href="#" class="btn btn-primary btn-elegant disabled">Vous devez être connecté pour participer</a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="offset-md-3 col-md-4">
                        <h3 class="card-description">{{$data['description']}}</h3>
                    </div>
                    <div class="offset-md-2 col-md-3">
                        @if($likes == true)
                            <a href="/api/like/{{$data['id']}}" class="red-text"><i class="fas fa-heart fa-2x"></i></a>
                        @else
                            @if(\App\User::getUser() != null)
                                <a href="/api/like/{{$data['id']}}" class="text-dark"><i class="far fa-heart fa-2x"></i></a>
                            @endif
                        @endif
                        @if(\App\User::getUser() != null && \App\User::getUser()['usertypeId'] == 2)
                            <a href="#" class="text-dark ml-4" id="downloadLink"><i class="fas fa-download fa-2x"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="centralModalLg" tabindex="1" role="dialog" aria-labelledby="myModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModal">Galerie photos</h4>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row modal-img justify-content-center">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal">Close</button>
                    @if(\App\User::getUser() != null && $participate == true)
                        <form class="md-form" id="fileForm" method="POST" enctype="multipart/form-data" action="/api/uploadfile/{{$data['id']}}">
                            <div class="file-field">
                                <div class="btn btn-primary btn-sm">
                                    <span id="addFile">Ajouter</span>
                                    <input type="file" id="fileInput" name="fileInput" hidden>
                                </div>
                            </div>
                        </form>
                    @endif
                    @if(\App\User::getUser() != null && \App\User::getUser()['usertypeId'] === 3)
                        <button type="button" class="btn btn-primary btn-sm" id="downloadImages">Télécharger les images</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!--Section: Comments-->
    <section class="my-5">
        <div class="card bg-white">
            <!-- Card header -->
            <h3 class="card-header border-0 font-weight-bold bg-white text-center pt-4">Commentaires</h3>

            <div class="mt-3">
                <ul class="list-group">
                    @foreach($coms as $commentary)
                        @if($commentary['eventId'] === $data['id'])
                            <li class="list-group-item">
                                <div class="md-v-line"></div><i class="fas fa-comments mr-4"></i> <span style="font-weight: bold;">{{$commentary['user']['first_name']}} {{$commentary['user']['last_name']}}:</span> {{$commentary['commentary']}}
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="media d-block d-md-flex">
                <div class="media-body text-center text-md-left ml-md-3 ml-0 text-dark">
                    <form action="/api/addcom/{{$data['id']}}" method="post">
                        <div class="form-group mt-3">
                            <label for="quickReplyFormComment">Votre commentaire</label>
                            <textarea class="form-control" id="comment" name="commentaries" rows="5"></textarea>

                            <div class="text-center my-3">
                                @if(\App\User::getUser() != null)
                                    <button class="btn btn-primary btn-sm btn-elegant" type="submit">Publier</button>
                                @else
                                    <button class="btn btn-primary btn-sm btn-elegant disabled" type="submit">Vous devez être connecté pour publier un commentaire</button>
                                @endif
                            </div>
                            <div class="text-center my-2">
                                @if(\App\User::getUser() != null && \App\User::getUser()['usertypeId'] == 2)
                                    <a class="red-text" href="/api/event/remove/{{$data['id']}}" style="text-decoration: underline;">Supprimer l'évènement</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section: Comments-->

@endsection

@section('scripts')

    <script src="/assets/js/eventype.js"></script>

@endsection
