@extends('master')
@section('maincontent')
    <div class="layout-content">
        <div class="layout-content-body">

            <div class="text-center m-b">
                <h3 class="m-b-0">All Notifications</h3>
                <small>Try Any key Word in Search Box</small>
            </div>
            <div class="row">

                    <div class="panel">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                                    <thead>

                                    <tr>
                                        <th>Notification SL</th>
                                        <th>Type</th>
                                        <th>ID</th>
                                        <th>part</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Detail</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($notifications as $notification)
                                        <tr>
                                            <td>
                                                <p>{{ $notification->notification_id }}</p>
                                            </td>
                                            <td class="maw-320">
                                                <p>{{ $notification->type }}</p>
                                            </td>
                                            <td>{{ $notification->doc_id }}</td>
                                            <td data-order="1">
                                                {{ $notification->part }}
                                            </td>
                                            <td>
                                                {{ $notification->description }}
                                            </td>
                                            <td>
                                                {{ $notification->insertion_time }}
                                            </td>
                                            <td data-order="3"><a class="btn btn-primary btn-block" href="{{ route('notification_detail',['type'=>$notification->type,'doc_id'=>str_replace('/','-',$notification->doc_id),'part'=>$notification->part]) }}">Detail</a></td>
                                            <td data-order="1"><a class="btn btn-primary btn-block" href="{{ route('notification_delete',['notification_id'=>$notification->notification_id]) }}">Delete</a></td>

                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection