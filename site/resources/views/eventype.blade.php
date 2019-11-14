@extends('layout')

@section('maincontent')

    <div class="card my-4 text-center">
        <div class="card-body">
            <h2 class="card-title">{{$data['name']}}</h2>
            <h3 class="card-description text-center">{{$data['description']}}</h3>
            <a href="#" class="btn btn-primary btn-elegant" style="left:40%">Inscription</a>
        </div>
    </div>

    <!--Section: Comments-->
    <section class="my-5">
    <div class="card bg-white">
        <!-- Card header -->
        <h3 class="card-header border-0 font-weight-bold bg-white">Commentaires</h3>

        <div class="media d-block d-md-flex">
            <div class="media-body text-center text-md-left ml-md-3 ml-0 text-dark">
                <form action="/api/addcom" method="post">
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
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>
    <!--Section: Comments-->

@endsection
