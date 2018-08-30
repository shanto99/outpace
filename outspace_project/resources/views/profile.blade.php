@extends('master')
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Employee Profile</span>
                </h1>

            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">
                        <form class="form" method="post" action="{{ route('change_profile') }}">
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input id="designation" class="form-control" type="text" readonly value="{{ Auth::user()->user_id }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" name = "email" type="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input id="old_password" name = "old_password" class="form-control" type="password">
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input id="new_password" name = "new_password" class="form-control" type="password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input id="confirm_password" name = "confirm_password" class="form-control" type="password">
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input class="form-control" type="text" data-provide="datepicker" data-date-today-highlight="true">
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