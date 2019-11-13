@extends('layout')

@section('maincontent')

    <div class="container main-section">
        <div class="row">
            <div class="col-lg-12 pb-2">

            </div>
            <div class="col-lg-12 pl-3 pt-3">
                <table class="table table-hover border bg-white">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th style="width:10%;">Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-lg-2 Product-img">
                                    <img src="http://nicesnippets.com/demo/sc-images.jpg" alt="..." class="img-responsive"/>
                                </div>
                                <div class="col-lg-10">
                                    <h4 class="nomargin">Lenovo K6 Power</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </td>
                        <td> 12,000 </td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="1">
                        </td>
                        <td>12,000</td>
                        <td class="actions" data-th="" style="width:10%;">
                            <button class="btn btn-info btn-sm"><i class="fas fa-sync-alt"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-lg-2 Product-img">
                                    <img src="http://nicesnippets.com/demo/sc-KHIP6xxGLD-webres.jpg" alt="..." class="img-responsive"/>
                                </div>
                                <div class="col-lg-10">
                                    <h4 class="nomargin">Iphone 6s</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </td>
                        <td> 35,000 </td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="1">
                        </td>
                        <td> 35,000 </td>
                        <td class="actions" data-th="" style="width:10%;">
                            <button class="btn btn-info btn-sm"><i class="fas fa-sync-alt"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </td>
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




