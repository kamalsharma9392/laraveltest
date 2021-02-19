@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-inline-flex">Services</h5>
                        <span class="float-right d-inline-flex">
                            <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(!empty($service->id))
                        <form action="{{ route('services.update',$service->id) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                        @else
                        <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                        @endif
                            @csrf()
                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">
                                    {{ __('Title') }}
                                </label>
                                <div class="col-md-9">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$service->title) }}" autocomplete="name" autofocus placeholder="Title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* {{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slug" class="col-md-3 col-form-label text-md-right">
                                    {{ __('Slug') }}
                                </label>
                                <div class="col-md-9">
                                    <input id="slug" type="text" class="form-control  @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug',$service->slug) }}" autocomplete="slug" placeholder="Slug">
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* {{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="categories" class="col-md-3 col-form-label text-md-right">
                                    {{ __('Categories') }}
                                </label>
                                <div class="col-md-9">
                                    @php
                                        $selectedCategories = [];
                                        if(!empty($service->id))
                                            $selectedCategories = array_column($service->categories->toArray(),'id');
                                    @endphp
                                    <select class="form-control select2 @error('categories') is-invalid @enderror" name="categories[]" id="categories" multiple="multiple">
                                        @forelse($categories as $item)
                                            <option @if(in_array($item->id,$selectedCategories)) selected @endif value="{{ $item->id }}">{{ $item->title }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('categories')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>* {{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            @if(!empty($service->image))
                                <div class="form-group row">
                                    <label for="image" class="col-md-3 col-form-label text-md-right">
                                        {{ __('Image') }}
                                    </label>
                                    <div class="col-md-9">
                                        <img src="{{ asset('storage/'.$service->image) }}" class="img-responsive" width="200px" alt="">
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="image" class="col-md-3 col-form-label text-md-right">
                                    {{ !empty($service->image)?__('Update Image'):__('Image') }}
                                </label>
                                <div class="col-md-9">
                                    <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* {{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">
                                    {{ __('Description') }}
                                </label>
                                <div class="col-md-9">
                                    <textarea id="description" class="content form-control @error('description') is-invalid @enderror" name="description" placeholder="Desciption">{{ old('description',$service->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* {{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-3 col-form-label text-md-right">
                                    {{ __('Price') }}
                                </label>
                                <div class="col-md-9">
                                    <input id="price" type="text" class="form-control  @error('price') is-invalid @enderror" name="price" value="{{ old('price',$service->price) }}" autocomplete="price" placeholder="Price">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>* {{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-3 col-form-label text-md-right">
                                    {{ __('Status') }}
                                </label>
                                <div class="col-md-9">
                                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option @if($service->status=="Active") selected @endif value="1">Active</option>
                                        <option @if($service->status=="InActive") selected @endif value="0">InActive</option>
                                    </select>
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
    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2/select2.min.css')}}">
@endsection

@section('scripts')
    <script src="{{ asset('vendor/react/react.production.min.js') }}"></script>
    <script src="{{ asset('vendor/react/react-dom.production.min.js') }}"></script>
    <script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>
    <script src="{{ asset('vendor/slugify/speakingurl.min.js') }}"></script>
    <script src="{{ asset('vendor/slugify/slugify.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Laraberg.init('description',{height:'10vh'});
            jQuery('#slug').slugify('#title');
            jQuery('.select2').select2({
                placeholder: 'Choose Categories'
            });
        });
    </script>
@endsection
