@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Categories</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Category Photo</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td><strong> {{ $category->id }} </strong></td>
                                    <td>
                                        <div class="d-flex align-items-center"><span class="w-space-no">
                                                {{ $category->category_name }} </span></div>
                                    </td>
                                    <td> {{ $category->category_slug }} </td>
                                    <td class="text-center">

                                        @if ($category->category_photo != 'null')
                                            <img src="{{ asset('uploads/category_photo') }}/{{ $category->category_photo }}"
                                                alt="#" style="width: 50px; height:50px" class="img-fluid">
                                        @else
                                            <img src="{{ asset('dashboard_assets') }}/images/default_profile_photo.png"
                                                class="img-fluid rounded-circle" alt="#"
                                                style="width: 50px; height:50px">
                                        @endif

                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center"> {{ $category->created_at }} </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">

                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-primary shadow btn-xs sharp mr-1">
                                                <i class="fa fa-pencil"></i>
                                            </a>


                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
