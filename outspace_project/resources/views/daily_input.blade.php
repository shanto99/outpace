@extends('master')
@section('maincontent')

    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Input Today's Delivery</span>
                </h1>

            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">
                        <form class="form" method="post" action="{{ route('delivered_do_product') }}">
                            <div class="md-form-group">
                                <label class="control-label" for="do_no">Select a DO</label>
                                <div>
                                    <select class = "md-form-control" id="do_no" name = "do_no">
                                        <option disabled selected value> -- select an option -- </option>
                                        @foreach($all_dos as $all_do)
                                            <option value="{{ $all_do->order_no }}">{{ $all_do->order_no }}</option>
                                        @endforeach
                                    </select>
                                    <label class="md-control-label"></label>
                                </div>
                            </div>
                            <div class="md-form-group">
                                <label class="control-label" for="do_pi">Select a PI</label>
                                <div>
                                    <select class = "md-form-control" id="do_pi" name = "do_pi">
                                        <option disabled selected value> -- select an option -- </option>
                                    </select>
                                    <label class="md-control-label"></label>
                                </div>
                            </div>
                            <div class="md-form-group">
                                <label class="control-label" for="count_name">Count</label>
                                <div>
                                    <select id="count_name" name = "count_name" class="md-form-control">
                                        <option disabled selected value> -- select an option -- </option>

                                    </select>
                                    <label class="md-control-label"></label>
                                </div>
                            </div>
                            <div class="md-form-group">
                                <label class="control-label" for="unit_price">Unit Price</label>
                                <div>
                                    <input id="unit_price" class="md-form-control" type="text" readonly name = "unit_price">
                                    <label class="md-control-label"></label>
                                </div>
                            </div>
                            <div class="md-form-group">
                                <label class="control-label" for="quantity">Quantity</label>
                                <div>
                                    <input id="quantiy" class="md-form-control" type="text" name = "quantity" required>
                                    <label class="md-control-label"></label>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Save</button>
                            <input type = "hidden" name = "_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
@endsection

@section('script')
    <script src="{{ URL::to('src/js/app.js') }}"></script>
@endsection