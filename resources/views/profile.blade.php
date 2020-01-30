@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>@php echo strtok(Auth::user()->name, ""); @endphp's Profile</h4>
        </div>

        <div class="card-body">
            <h5>Hi @php echo strtok(Auth::user()->name, ""); @endphp</h5>
            <div class="alert-info rounded-l-full rounded-r-full p-3 mt-3 mb-3 center announce">
                <p>Announcements regarding service status, security alerts, promoted account actions, etc.</p>
            </div>

            <div class="row mt-1">
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-heading vliheading roundedTop vgrad">
                            <h5>Personal Details</h5>
                        </div>
                        <div class="card-body borderTopNone">
                            <p>
                                <span>Name: <b>{{Auth::user()->name}}</b></span><br>
                                <span>Email: <b>{{Auth::user()->email}}</b></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-heading vliheading roundedTop vgrad">
                            <h5>Orders</h5>
                        </div>
                        <div class="card-body borderTopNone">
                                @foreach ($orders as $order)
                                    <p>Order {{ $order->id }} - {{ $order->created_at }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-heading vliheading roundedTop vgrad">
                            <h5>Resources</h5>
                        </div>
                        <div class="card-body borderTopNone">
                            <ul>
                                <li><a href="#">Resource 1</a></li>
                                <li><a href="#">Resource 2</a></li>
                                <li><a href="#">Resource 3</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
