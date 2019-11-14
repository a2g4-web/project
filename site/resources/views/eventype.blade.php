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
        <div class="card-header border-0 font-weight-bold whit bg-white">Commentaires</div>

        <div class="media d-block d-md-flex mt-4">

            <div class="media-body text-center text-md-left ml-md-3 ml-0  text-dark">
                <h5 class="font-weight-bold mt-0">
                    <a href="" style="color: black">Miley Steward</a>
                    <a href="" class="pull-right" style="color: black">
                        <i class="fas fa-reply"></i>
                    </a>
                </h5>
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                <!-- Quick Reply -->
                <form action="/api/addcom" method="post">
                <div class="form-group mt-3">
                    <label for="quickReplyFormComment">Votre commentaire</label>
                    <textarea class="form-control" id="comment" name="commentaries" rows="5"></textarea>

                    <div class="text-center my-3">
                        <button class="btn btn-primary btn-sm btn-elegant" type="submit">Publier</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>
    <!--Section: Comments-->

@endsection
