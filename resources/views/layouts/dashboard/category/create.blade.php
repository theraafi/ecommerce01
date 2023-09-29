@extends('layouts.dashboard')

@section('content')
    <div class="col-xl-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Category</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Category Name"
                                    name="category_name">
                                @error('category_name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category-Slug</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Category Slug"
                                    name="category_slug">
                                @error('category_slug')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category Photo</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" placeholder="Password" name="category_photo">
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                        @if (session('category_added'))
                            <div class="text-success text-center mb-2">
                                {{ session('category_added') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
