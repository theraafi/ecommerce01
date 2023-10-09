@extends('layouts.dashboard')

@section('content')
    {{-- Category name change --}}
    <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Change Category Name</h4>
            </div>
            <div class="card-body">
                @if (session('category_name_updated'))
                    <div class="text-success text-center mb-2">
                        {{ session('category_name_updated') }}
                    </div>
                @endif
                <div class="basic-form">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Old Category Name</label>
                            <div class="col-sm-9">
                                {{ $category->category_name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">New Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Name here"
                                    name="category_name">
                            </div>
                            @error('category_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="form-group row mt-5">
                            <label class="col-sm-3 col-form-label">Old Category Name</label>
                            <div class="col-sm-9">
                                {{ $category->category_slug }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">New Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Name here"
                                    name="category_slug">
                            </div>
                            @error('category_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="form-group row mt-5">
                            <label class="col-sm-3 col-form-label">Old Category Photo</label>
                            <div class="col-sm-9">
                                <img src="{{ asset('uploads/category_photo') }}/{{ $category->category_photo }}"
                                    alt="#" style="width: 100px; height:100px" class="img-fluid">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">New Category Photo</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" placeholder="Enter Name here"
                                    name="category_photo">
                            </div>
                        </div>

                        <div class="col-sm-10 text-center mt-5">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Category slug change --}}
    {{-- <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Change Category Slug</h4>
            </div>
            <div class="card-body">
                @if (session('category_slug_updated'))
                    <div class="text-success text-center mb-2">
                        {{ session('category_slug_updated') }}
                    </div>
                @endif
                <div class="basic-form">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Old Category Name</label>
                            <div class="col-sm-9">
                                {{ $category->category_slug }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">New Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Name here"
                                    name="category_slug">
                            </div>
                            @error('category_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Change Category Name</h4>
            </div>
            <div class="card-body">
                @if (session('category_slug_updated'))
                    <div class="text-success text-center mb-2">
                        {{ session('category_slug_updated') }}
                    </div>
                @endif
                <div class="basic-form">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Old Category Name</label>
                            <div class="col-sm-9">
                                {{ $category->category_name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">New Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Name here"
                                    name="category_name">
                            </div>
                            @error('category_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Category Photo Change --}}
    {{-- <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Change Category Photo</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Old Category Photo</label>
                            <div class="col-sm-9">
                                @if ($category->category_photo != 'null')
                                    <img src="{{ asset('uploads/category_photo') }}/{{ $category->category_photo }}"
                                        alt="#" style="width: 100px; height:100px" class="img-fluid">
                                @else
                                    <img src="{{ asset('dashboard_assets') }}/images/default_profile_photo.png"
                                        class="img-fluid rounded-circle" alt="#" style="width: 50px; height:50px">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">New Category Photo</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" placeholder="Enter Name here"
                                    name="category_photo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
