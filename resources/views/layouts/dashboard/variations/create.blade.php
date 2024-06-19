@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Size</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('variation.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Add Size Variation</label>
                                <div class="col-sm-6">
                                    <input type="size" class="form-control" placeholder="Size" name="size">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add</button>
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

        <div class="col-xl-4 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sizes</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-info">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>Mark</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
