@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-inline-flex">Categories</h5>
                        <span class="float-right d-inline-flex">
                            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(!empty($category->id))
                        <form action="{{ route('categories.update',$category->id) }}" method="post">
                            @method('put')
                        @else
                        <form action="{{ route('categories.store') }}" method="post">
                        @endif
                            @csrf()
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Category Title') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$category->title) }}" autocomplete="name" autofocus placeholder="Category Title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="parent" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Parent') }}
                                </label>
                                <div class="col-md-6">
                                    <select id="parent" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
                                        <option value="">Select Parent</option>
                                        @forelse ($categories as $item)
                                        <option @if($category->parent_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->title }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Changes') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection
