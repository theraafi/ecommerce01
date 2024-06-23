<div>
    <div class="row">
        {{-- Color Add Start --}}
        <div class="col-xl-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Color Variant</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">

                        <form wire:submit.prevent="color_insert">

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Color Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" wire:model="color_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Color Code</label>
                                <div class="col-sm-6">
                                    <input type="color" class="form-control" wire:model="color_code">
                                </div>
                            </div>


                            <div class="form-group row mt-4">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                            @if (session('color_added'))
                                <div class="alert alert-success">
                                    {{ session('color_added') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Color Add End --}}
    </div>

    <div class="row">
        <div class="col-xl-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Color Variants</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-info">
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Color Name</th>
                                    <th scope="col">Color Code</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $color)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <th>{{ $color->id }}</th>
                                        <td>{{ $color->color_name }}</td>
                                        <td> <span
                                                style="background: {{ $color->color_code }}; height:70px; width:70px; color: #ffff">
                                                {{ $color->color_code }} </span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger shadow btn-xs sharp"
                                                wire:click="delete_color({{ $color->id }})"
                                                wire:confirm="Are you sure you want to delete this size?">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>

                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary shadow btn-xs sharp" wire:click="editcolor({{ $color->id }})" data-toggle="modal" data-target="#editcolor{{ $color->id }}">
                                                <i class="fa fa-pencil"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div wire:ignore.self class="modal fade" id="editcolor{{ $color->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Color Update
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-xl-12 m-auto">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Update Color Variant</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="basic-form">

                                                                            <form wire:submit.prevent="updatecolor({{ $color->id }})">

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-6 col-form-label">Update Color Name</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" class="form-control" wire:model="color_name">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-6 col-form-label">Update Color Code</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="color" class="form-control" wire:model="color_code">
                                                                                    </div>
                                                                                </div>


                                                                                <div class="form-group row mt-4">
                                                                                    <div class="col-sm-10">
                                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                                    </div>
                                                                                </div>
                                                                                {{-- @if (session('color_added'))
                                                                                    <div class="alert alert-success">
                                                                                        {{ session('color_added') }}
                                                                                    </div>
                                                                                @endif --}}
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @if (session('color_deleted'))
                            <div class="text-danger text-center mb-2">
                                {{ session('color_deleted') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
        {{-- Show Color --}}

        {{-- Show Color --}}


</div>
