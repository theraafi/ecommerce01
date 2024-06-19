@extends('layouts.dashboard')

@section('content')
<div class="col-xl-6 m-auto">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Sizes</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-info">
                        <tr>
                            <th scope="col">Size #ID</th>
                            <th scope="col">Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sizes as $size)
                        <tr>
                            <th> {{$size->id}} </th>
                            <td>{{$size->size}}</td>
                            
                        </tr> 
                        @empty
                        <td>
                            <div class="alert alert-info">
                                No Sizes Found
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