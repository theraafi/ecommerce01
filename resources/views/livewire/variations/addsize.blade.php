<div>
    <div class="row">
        {{-- Size Add Start --}}
        <div class="col-xl-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Size</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">

                        <form wire:submit.prevent="size_insert">

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Add Size Variation</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Add Size" wire:model="size">
                                </div>

                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                            @if (session('size_added'))
                                <div class="alert alert-success">
                                    {{ session('size_added') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Size Add End --}}

        {{-- Show Sizes --}}
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
                                    <th scope="col">Serial</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $size)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <th>{{ $size->id }}</th>
                                        <td>{{ $size->size }}</td>
                                        <td>
                                            {{-- <button type="button" class="btn btn-primary shadow btn-xs sharp mr-1" wire:click="edit_size({{ $size->id }})">
                                                <i class="fa fa-pencil"></i>

                                            </button> --}}

                                            <button type="button" class="btn btn-danger shadow btn-xs sharp"
                                                wire:click="delete_size({{ $size->id }})"
                                                wire:confirm="Are you sure you want to delete this size?">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @if (session('size_deleted'))
                            <div class="alert alert-danger">
                                {{ session('size_deleted') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Show Sizes --}}

    </div>
</div>
