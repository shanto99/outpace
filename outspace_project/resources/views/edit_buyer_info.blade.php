@extends('master')
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Edit Buyer Information</span>
                </h1>

            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">
                        <form class="form" method="post" action="{{ route('change_buyer') }}">
                            <label class="control-label" for="select_a_bank">Select a Buyer</label>
                            <div>
                                <select class = "md-form-control" id="select_buyer" name = "select_buyer">
                                    <option disabled selected value> -- select an option -- </option>
                                    <option value = "add_buyer">Add New Buyer</option>
                                    @foreach($data as $row)
                                        <option value="{{ $row['buyer_id'] }}">{{ $row['buyer_name'] }}</option>
                                    @endforeach
                                </select>
                                <label class="md-control-label"></label>
                            </div>
                            <input type="hidden" name = "buyer_id" id = "buyer_id">
                            <label class="control-label" for="buyer_name">Buyer Name</label>
                            <div class="md-form-group">
                                <input class="md-form-control" name = "buyer_name" id = "buyer_name" type="text" id="buyer_name">
                                <label class="md-control-label"></label>
                            </div>
                            <label class="control-label" for="office_address">Office Address</label>
                            <div class="md-form-group">
                                <textarea name="office_address" id="office_address"></textarea>
                                <label class="md-control-label"></label>
                            </div>
                            <label class="control-label" for="factory_address">Factory Address</label>
                            <div class="md-form-group">
                                <textarea name = "factory_address" id="factory_address"></textarea>
                                <label class="md-control-label"></label>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Save Changes</button>
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