@extends('master')
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">ADD Maturity</span>
                </h1>

            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">
                        <form class="form" method="post" action="{{ route('route_wfba') }}">

                            <div class="form-group">
                                <select id="doc_id" name="doc_id" class="form-control">
                                    <option disabled selected value> -- select a Document -- </option>
                                    @foreach($docs as $doc)
                                        <option value = "{{ $doc->doc_id }}">{{ $doc->ci_id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">BanK Sub. Date</label>
                                <input class="form-control" type="text" name = "submission_date" data-provide="datepicker" data-date-today-highlight="true">
                            </div>
                            <div>
                                <label for="bank_ref_no">Bank Ref. NO.</label>
                                <input class="form-control" type="text" id="bank_ref_no" name="bank_ref_no">
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