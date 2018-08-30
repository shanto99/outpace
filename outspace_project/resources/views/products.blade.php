@extends('master')
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">
                        <form class="form" method="post" action="{{ route('insert_product') }}">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input id="product_name" name="product_name" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="unit_price">Unit Price</label>
                                <input id="unit_price" name="unit_price" class="form-control" type="text">
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Save</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>

                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Detail</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <p>{{ $product->id }}</p>
                            </td>
                            <td class="maw-320">
                                <p>{{ $product->name }}</p>
                            <td>
                                {{ $product->unit_price }}
                            </td>
                            <td data-order="3"><button class="btn btn-primary btn-block" type="submit">Detail</button></td>
                            <td data-order="1"><a class="btn btn-primary btn-block" href="{{ route('delete_product',['id'=>$product->id]) }}">DELETE</a></td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
@endsection