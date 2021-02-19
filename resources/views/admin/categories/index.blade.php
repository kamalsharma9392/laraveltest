@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-inline-flex">Categories</h5>
                        <span class="float-right d-inline-flex">
                            <a href="{{ route('categories.create') }}" class="btn btn-outline-info">Add Category</a>
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
                                <th>Parent</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->id}}</td>
                                    <td>{{ $category->title}}</td>
                                    <td>{{ empty($category->parent_id)? 'N/A' : $category->parent->title }}</td>
                                    <td>
                                        <span class="dropdown">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <a class="dropdown-item" href="{{ route('categories.edit',$category->id) }}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <form action="{{route('categories.destroy',$category->id)}}" method="post" onsubmit="return confirm(' Are you sure want to do this ?');" id="delete-form">
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
                                    <td colspan="4" class="text-center">No records found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
