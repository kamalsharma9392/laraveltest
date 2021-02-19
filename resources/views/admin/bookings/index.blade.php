@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-inline-flex">Bookings</h5>
                        <span class="float-right d-inline-flex">

                        </span>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Service</th>
                                <th>User</th>
                                <th>Address</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-12">
                                                <img style="width: 50px; height: 50px;" src="{{ asset('storage/'.$booking->service->image) }}" alt="" class="d-inline-flex">
                                                <p><strong>{{ $booking->service->title }}</strong></p>
                                                <p>${{ $booking->service->price }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                <img style="width: 50px; height: 50px;" src="{{ asset('storage/'.$booking->user->profile_pic) }}" alt="">
                                            </div>
                                            <div class="col-10">
                                                <p><strong>{{ $booking->user->name }}</strong></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $booking->address }}</td>
                                    <td>{{ $booking->start_time }}</td>
                                    <td>{{ $booking->end_time }}</td>
                                    <td>
                                        @if($booking->status=='ACTIVE')
                                            <label class="badge badge-success">{{ $booking->status}}</label>
                                        @elseif($booking->status=='PENDING')
                                            <label class="badge badge-warning">{{ $booking->status}}</label>
                                        @else
                                            <label class="badge badge-secondary">{{ $booking->status}}</label>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No records found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $bookings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
