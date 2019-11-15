@extends('layout')

@section('maincontent')

    <div class="container main-section">
        <div class="row justify-content-center">
            <div class="col-md-10 pl-3 pt-3">
                <table class="table bg-white">

                    <thead>
                        <tr>
                            <th scope="col">Photo</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                            <tbody>

                            @if(\Illuminate\Support\Facades\Cookie::get('basket') != null)
                                @foreach($articles as $article)
                                    <tr>
                                        <td><img width="100" class="img-fluid" src="{{$article['imageUrl']}}" alt="iphone"></td>
                                        <td>{{$article['name']}}</td>
                                        <td class="article-price">{{$article['price']}}€</td>
                                        <td>1</td>
                                        <td><a class="btn btn-danger" href="/api/removefrombasket/{{$article['id']}}"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                @endforeach
                            @else
                                <h3 class="text-white text-center">Le panier est vide</h3>
                            @endif

                            </tbody>

                    <tfoot>
                    <tr>
                        <td><a href="/shop" class="btn btn-elegant waves-effect text-white"><i class="fa fa-angle-left"></i> Continuer mes achats</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center" style="width:10%;"><strong id="totalArticle"></strong></td>
                        <td><a href="#" class="btn btn-success btn-elegant">Paiement <i class="fa fa-angle-right"></i></a></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="/assets/js/basket.js"></script>
@endsection

