@extends('layouts.dashboard')

@section('content')
    <div class="col-xl-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Product</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Product Name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">SKU</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter SKU" name="sku">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter SKU" name="category_id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Purchase Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="Enter Purchase Price"
                                    name="purchase_price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">MRP</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="Enter MRP" name="mrp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Discounted Price</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="Enter Discounted Price"
                                    name="discounted_price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="Write Short Description"
                                    name="short_description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea name="long_description" id="" cols="70" rows="5"></textarea>
                                {{-- <input type="number" class="form-control" placeholder="Enter Category Name"
                                    name="discounted_price"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Additional information</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="Write Additional information" name="additional_information">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Thumbnail</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" placeholder="Password" name="tumbnail">
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                        {{-- @if (session('category_added'))
                            <div class="text-success text-center mb-2">
                                {{ session('category_added') }}
                            </div>
                        @endif --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
