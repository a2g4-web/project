@extends('layout')

@section('active2')

    active

@endsection

@section('maincontent')



    <section class="text-center my-4">

        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Notre boutique</h2>
                <!-- Section description -->
                <p class="card-text text-center">Bienvenue sur la boutique de votre BDE, vous trouverez grand nombre d'articles à votre disposition</p>
                <!-- Search form -->
                <div class="row justify-content-center">
                    <div class="md-form input-group col-md-2">
                        <input aria-label="Search" class="form-control" id="recherche" placeholder="Rechercher" type="text">
                        <div class="input-group-prepend">
                            <span class="input-group-text md-addon" id="material-addon-addon1"><a href="#" class="text-blue" id="recherche-link"><i class="fas fa-search"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Products v.1 -->



    <div class="container">
        <div class="row justify-content-center articles">

        </div>
    </div>

    @if(\App\User::getUser() != null && \App\User::getUser()['usertypeId'] == 2)
        <div class="btn-fix text-center">
            <a class="btn-floating btn-elegant btn-lg white-text" href="#" data-toggle="modal" data-target="#centralModalLg"><i class="fas fa-plus mt-3"></i></a>
        </div>
    @endif

    <div class="modal fade" id="centralModalLg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Ajout article</h4>

                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="/api/addarticle" enctype="multipart/form-data" method="post" id="articleForm">
                            <p class="h4 text-center">Ajouter un article</p>
                            <div class="md-form">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom de l'article">
                            </div>
                            <div class="md-form">
                                <input type="text" id="description" name="description" class="form-control" placeholder="Description de l'article">
                            </div>
                            <div class="md-form">
                                <input type="text" id="price" name="price" class="form-control" placeholder="Prix de l'évènement">
                            </div>
                            <div class="md-form">
                                <input type="text" id="categoryId" name="categoryId" class="form-control" placeholder="Catégorie de l'article">
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
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Ajout catégorie</h4>

                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="/api/addcategory" enctype="multipart/form-data" method="post" id="categoryForm">
                            <p class="h4 text-center">Ajouter une catégorie</p>
                            <div class="md-form">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nom de la catégorie">
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-elegant btn-sm" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary btn-sm" id="formSends">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


@endsection

@section('scripts')
<script src="/assets/js/shop.js"></script>
@endsection
