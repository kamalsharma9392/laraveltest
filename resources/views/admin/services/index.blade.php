@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-inline-flex">Services</h5>
                        <span class="float-right d-inline-flex">
                            <a href="{{ route('services.create') }}" class="btn btn-outline-info">Add Service</a>
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
                                <th>Title</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                <tr>
                                    <td>{{ $service->id}}</td>
                                    <td>{{ $service->title}}</td>
                                    <td><img style="width: 100px; height: 100px;" src="{{ asset('storage/'.$service->image) }}" alt=""></td>
                                    <td>${{ $service->price }}</td>
                                    <td>
                                        @if($service->status=='Active')
                                            <label class="badge badge-success">{{ $service->status}}</label>
                                        @else
                                            <label class="badge badge-danger">{{ $service->status}}</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($service->status=='Active')
                                            <a class="btn btn-sm btn-danger" href="{{ route('services.show',$service->id) }}">
                                                InActive
                                            </a>
                                        @else
                                            <a class="btn btn-sm btn-success" href="{{ route('services.show',$service->id) }}">
                                                Active
                                            </a>
                                        @endif
                                        <span class="dropdown">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <a class="dropdown-item" href="{{ route('services.edit',$service->id) }}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <form action="{{route('services.destroy',$service->id)}}" method="post" onsubmit="return confirm(' Are you sure want to do this ?');" id="delete-form">
                                                    @method('delete')
                                                    @csrf()
                                                    <button class="btn btn-xs btn-danger dropdown-item">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No records found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
