@extends('master')
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Edit Bank Information</span>
                </h1>

            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">
                        <form class="form" method="post" action="{{ route('edit_bank') }}">
                            <div class="md-form-group">
                                <label class="control-label" for="select_a_bank">Select a Bank</label>
                                <div>
                                    <select class = "md-form-control" id="bank" name = "bank">
                                        <option disabled selected value> -- select an option -- </option>
                                        <option value = "add_bank">Add New Bank</option>
                                        @foreach($data as $row)
                                            <option value="{{ $row['bank_name'] }}">{{ $row['bank_name'] }}</option>
                                            @endforeach
                                    </select>
                                    <label class="md-control-label"></label>
                                </div>
                            </div>
                            <div class="md-form-group">
                                <label class="control-label" for="branch">Select a Branch</label>
                                <div>
                                    <select id="branch" name = "branch" class="md-form-control">
                                        <option disabled selected value> -- select an option -- </option>

                                    </select>
                                    <label class="md-control-label"></label>
                                </div>
                            </div>
                            <div class="md-form-group">
                                <label for="bank_name">Bank Name</label>
                                <input id="bank_name" name = "bank_name" class="md-form-control" type="text" required>
                                <label class="md-control-label"></label>
                            </div>
                            <div class="md-form-group">
                                <label for="branch">Branch</label>
                                <input id="branch_name" name = "branch_name" class="md-form-control" type="text" required>
                                <label class="md-control-label"></label>
                            </div>
                            <div class="form-group">
                                <label for="address">Bank Address</label>
                                <textarea id = "address" name = "address"></textarea>
                            </div>
                            <div class="md-form-group">
                                <label for="admin_name">Admin Name</label>
                                <input id="admin_name" name = "admin_name" class="md-form-control" type="text" required>
                                <label class="md-control-label"></label>
                            </div>
                            <div class="md-form-group">
                                <label for="admin_designation">Admin Designation</label>
                                <input id="admin_designation" name="admin_designation" class="md-form-control" type="text" required>
                                <label class="md-control-label"></label>
                            </div>
                            <div class="md-form-group">
                                <label for="swift">SWIFT</label>
                                <input id="swift" name="swift" class="md-form-control" type="text" required>
                                <label class="md-control-label"></label>
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