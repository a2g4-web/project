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

                            <h3 class="text-white text-center">Le panier est vide</h3>

                            <tr>
                                <td><img width="100" class="img-fluid" src="/assets/img/img_carousel/balle.jpg" alt="iphone"></td>
                                <td>Iphone</td>
                                <td>40</td>
                                <td>1</td>
                                <td><a class="btn btn-danger" href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>

                            </tbody>

                    <tfoot>
                    <tr>
                        <td><a href="#" class="btn btn-elegant waves-effect text-white"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center" style="width:10%;"><strong>Total : 47,000</strong></td>
                        <td><a href="#" class="btn btn-success btn-elegant"> Checkout<i class="fa fa-angle-right"></i></a></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection




