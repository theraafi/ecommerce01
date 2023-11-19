@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Products</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>#SN</th>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>SKU</th>
                                <th>MRP</th>
                                <th>Thumbnail</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td><strong> {{ $loop->iteration }} </strong></td>
                                    <td><strong> {{ $product->id }} </strong></td>
                                    <td>
                                        <div class="d-flex align-items-center text-center"><span class="w-space-no">
                                                {{ $product->name }} </span></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-center"><span class="w-space-no">
                                                {{ $product->category_id }} </span></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-center"><span class="w-space-no">
                                                {{ $product->sku }} </span></div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-center"><span class="w-space-no">
                                                {{ $product->mrp }} </span></div>
                                    </td>


                                    <td class="text-center">

                                        @if ($product->thumbnail != 'null')
                                            <img src="{{ asset('uploads/thumbnail') }}/{{ $product->thumbnail }}"
                                                alt="#" style="width: 50px; height:50px" class="img-fluid">
                                        @else
                                            <img src="{{ asset('dashboard_assets') }}/images/default_profile_photo.png"
                                                class="img-fluid rounded-circle" alt="#"
                                                style="width: 50px; height:50px">
                                        @endif

                                    </td>
                                    <td>
                                        <div class="d-flex">

                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-primary shadow btn-xs sharp mr-1">
                                                <i class="fa fa-pencil"></i>
                                            </a>


                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button href="#" class="btn btn-danger shadow btn-xs sharp" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td>
                                    <div class="alert alert-info">
                                        No Categories Found
                                    </div>
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
