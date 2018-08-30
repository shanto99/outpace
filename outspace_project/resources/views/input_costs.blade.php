@extends('master')
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Input the Costs for Net Realization</span>
                </h1>

            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">
                        <form class="form" method="post" action="{{ route('save_net_realization') }}">
                            <label class="control-label" for="select_doc">Select a Doc</label>
                            <div class="form-group">
                                <select class = "form-control" id="select_doc" name = "select_doc">
                                    <option disabled selected value> -- select an doc -- </option>
                                    @foreach($datas as $data)
                                        <option value="{{ $data->doc_id }}">{{ $data->doc_id }}</option>
                                        @endforeach
                                </select>
                                <label class="md-control-label"></label>
                            </div>
                            <label class="control-label" for="short_payment">Short Payment</label>
                            <div class="form-group">
                                <input type="form-control" id="short_payment" name="short_payment">
                                <label class="md-control-label"></label>
                            </div>
                            <label class="control-label" for="crc_field">CRC</label>
                            <div class="form-group">
                                <input type="form-control" id="crc_field" name="crc_field">
                                <label class="md-control-label"></label>
                            </div>
                            <label class="control-label" for="loan_interest">Loan Interest</label>
                            <div class="form-group">
                                <input type="form-control" id="loan_interest" name="loan_interest">
                                <label class="md-control-label"></label>
                            </div>
                            <label class="control-label" for="loss_field">Loss</label>
                            <div class="form-group">
                                <input type="form-control" id="loss_field" name="loss_field">
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