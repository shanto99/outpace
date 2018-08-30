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
                        <form class="form" method="post" action="{{ route('return_goods_input') }}">
                            <div class="md-form-group">
                                <label class="control-label" for="do_no">Select a DO</label>
                                <div>
                                    <select class = "md-form-control" id="do_number" name = "do_number">
                                        <option disabled selected value> -- select an option -- </option>
                                            @foreach($delivered_do as $do)
                                                <option value="{{ $do->do_id }}">{{ $do->do_id }}</option>
                                             @endforeach
                                    </select>
                                    <label class="md-control-label"></label>
                                </div>
                            </div>
                            <div class="md-form-group">
                                <label class="control-label" for="do_pi_no">Select a PI</label>
                                <div>
                                    <select class = "md-form-control" id="do_pi_no" name = "do_pi_no">
                                        <option disabled selected value> -- select an option -- </option>
                                    </select>
                                    <label class="md-control-label"></label>
                                </div>
                            </div>
                            <div class="md-form-group">
                                <label class="control-label" for="count_description">Count</label>
                                <div>
                                    <select id="delivered_count" name = "count_description" class="md-form-control">
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
                            <div class="md-form-group">
                                <label class="control-label" for="return_cause">Cause of Return</label>
                                <div>
                                    <textarea class="md-form-control" id = "return_cause" name="return_cause"></textarea>
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