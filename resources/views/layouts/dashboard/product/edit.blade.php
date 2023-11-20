@extends('layouts.dashboard')

@section('content')
    <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Product</h4>
            </div>
            <div class="card-body">
                @if (session('product_updated'))
                    <div class="text-success text-center mb-2">
                        {{ session('product_updated') }}
                    </div>
                @endif
                <div class="basic-form">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $product->name }}" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">SKU</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $product->sku }}" name="sku">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option value="{{ $product->category_id }}"> Select Category </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Purchase Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{ $product->purchase_price }}"
                                    name="purchase_price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">MRP</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{ $product->mrp }}" name="mrp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Discounted Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{ $product->discounted_price }}"
                                    name="discounted_price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $product->short_description }}"
                                    name="short_description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $product->long_description }}"
                                    name="long_description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Additional information</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $product->additional_information }}"
                                    name="additional_information">
                            </div>
                        </div>


                        <div class="form-group row mt-5">
                            <label class="col-sm-3 col-form-label">Old Product Thumbnail</label>
                            <div class="col-sm-9">
                                <img src="{{ asset('uploads/thumbnail') }}/{{ $product->thumbnail }}" alt="#"
                                    style="width: 100px; height:100px" class="img-fluid">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">New Product Thumbnail</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="thumbnail">
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary"> Update </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
