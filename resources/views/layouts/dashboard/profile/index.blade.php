@extends('layouts.dashboard')


{{-- @section('content') --}}
<div class="row">
    <div class="col-lg-12">
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo w-100"
                                        style="background: url({{ asset('uploads/cover_photo') }}/{{ Auth::user()->cover_photo }}); background-repeat: no-repeat; background-size: cover; background-position: center;">
                                        {{-- @if (Auth::user()->cover_photo)
                                            <img src="{{ asset('uploads/cover_photo') }}/{{ Auth::user()->cover_photo }}"
                                                class="img-fluid w-100" alt="">
                                        @else
                                            <img src="{{ asset('dashboard_assets') }}/images/default_profile_photo.png"
                                                class="img-fluid w-100" alt="default_profile_photo.png">
                                        @endif --}}
                                    </div>
                                </div>
                                <div class="profile-info">
                                    <div class="profile-photo">

                                        @if (Auth::user()->profile_photo)
                                            <img src="{{ asset('uploads/profile_photo') }}/{{ Auth::user()->profile_photo }}"
                                                class="img-fluid rounded-circle" alt="">
                                        @else
                                            <img src="{{ asset('dashboard_assets') }}/images/default_profile_photo.png"
                                                class="img-fluid rounded-circle" alt="">
                                        @endif
                                    </div>
                                    <div class="profile-details">
                                        <div class="profile-name px-3 pt-2">
                                            <h4 class="text-primary mb-0"> {{ Auth::user()->name }} </h4>
                                            <p>UX / UI Designer</p>
                                        </div>
                                        <div class="profile-email px-2 pt-2">
                                            <h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
                                            <p>Email</p>
                                        </div>
                                        <div class="dropdown ml-auto">
                                            <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown"
                                                aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                    height="18px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24">
                                                        </rect>
                                                        <circle fill="#000000" cx="5" cy="12"
                                                            r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="12" cy="12"
                                                            r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="19" cy="12"
                                                            r="2">
                                                        </circle>
                                                    </g>
                                                </svg></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ url('profile') }}">
                                                    <li class="dropdown-item">
                                                        <i class="fa fa-user-circle text-primary mr-2"></i>
                                                        View profile
                                                    </li>
                                                </a>
                                                <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i>
                                                    Add to
                                                    close friends</li>
                                                <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i>
                                                    Add to
                                                    group</li>
                                                <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i>
                                                    Block</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    {{-- Profile Picture Change Start --}}
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Profile Picture</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                    <form action="{{ url('profile/photo/upload') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">

                                                <div class="profile-photo">
                                                    @if (Auth::user()->profile_photo)
                                                        <img src="{{ asset('uploads/profile_photo') }}/{{ Auth::user()->profile_photo }}"
                                                            class="img-fluid rounded-circle" alt=""
                                                            width="100">
                                                    @else
                                                        <img src="{{ asset('dashboard_assets') }}/images/default_profile_photo.png"
                                                            class="img-fluid rounded-circle" alt=""
                                                            width="100">
                                                    @endif
                                                </div>

                                            </label>
                                            <div class="col-sm-7 mt-5">
                                                <input type="file" class="form-control" name="profile_photo">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10 text-center mt-5">
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Profile Picture Change end --}}

                    {{-- Password Change start --}}
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Password Change</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    @if (session('update_successful'))
                                        <div class="text-success text-center mb-2">
                                            {{ session('update_successful') }}
                                        </div>
                                    @endif
                                    <form action="{{ url('password/change') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Old Password</label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control"
                                                    placeholder="Old Password" name="old_password">
                                                @error('old_password')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                                @if (session('old_pass_error'))
                                                    <span class="text-danger">
                                                        {{ session('old_pass_error') }}
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">New Password</label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control"
                                                    placeholder="New Password" name="password">
                                                @error('password')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Confirm Password</label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control"
                                                    placeholder="Confirm Password" name="password_confirmation">
                                                @error('password_confirmation')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-10 text-center mt-2">
                                                <button type="submit" class="btn btn-primary">Change</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Password Change end --}}
                </div>


                <div class="row">
                    {{-- Cover Photo Change Start --}}
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cover Photo</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                    <form action="{{ url('profile/cover/upload') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">

                                                <div class="profile-photo">
                                                    @if (Auth::user()->cover_photo)
                                                        <img src="{{ asset('uploads/cover_photo') }}/{{ Auth::user()->cover_photo }}"
                                                            class="img-fluid w-100" alt="">
                                                    @else
                                                        <img src="{{ asset('dashboard_assets') }}/images/default_profile_photo.png"
                                                            class="img-fluid w-100" alt="default_profile_photo.png">
                                                    @endif
                                                </div>

                                            </label>
                                            <div class="col-sm-7 mt-5">
                                                <input type="file" class="form-control" name="cover_photo">
                                                @error('cover_photo')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10 text-center mt-5">
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Cover Photo Change End --}}

                    {{-- Phone number verification start --}}
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Phone Number Verify</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                    <form action="{{ url('phone/number/add') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">

                                            <label class="col-sm-4 col-form-label">Phone Number</label>
                                            <div class="col-sm-6">
                                                @if (session('number_added'))
                                                    <div class="text-success mt-2">
                                                        {{ session('number_added') }}
                                                    </div>
                                                @endif
                                                <input type="number" class="form-control" placeholder="Enter Here"
                                                    name="phone_number">

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-10 text-center">
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>

                                            </div>
                                        </div>

                                    </form>

                                    <div class="form-group row">
                                        <div class="col-sm-10 mt-2">
                                            @if ($verification_status)
                                                <a href="#" class="btn btn-primary btn-sm btn-success">Verified</a>
                                            @else
                                                <a href="#" class="btn btn-primary btn-sm btn-danger text-center">
                                                    Not Verified
                                                </a>
                                                <a href="{{ url('phone/number/verify') }}" class="btn btn-primary btn-sm btn-success text-center">
                                                    Verify Now
                                                </a>
                                                @if (session('otp_sent'))
                                                    <div class="text-success text-center mb-2">
                                                        {{ session('otp_sent') }}
                                                    </div>
                                                @endif

                                            @endif

                                            @if (!$verification_status)
                                                <div class="form-group row mt-3">
                                                    <label class="col-lg-5 col-form-label">Your OTP</label>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Here" name="code">

                                                    </div>
                                                </div>
                                                <form action="{{ url('code/confirm') }}" method="POST">
                                                    @csrf

                                                    <div class="col-lg-6 text-center">
                                                        <button type="submit" class="btn btn-primary">
                                                            Confirm OTP
                                                        </button>
                                                    </div>

                                                </form>
                                                @if (session('otp_mismatch'))
                                                    <div class="text-success text-center mb-2">
                                                        {{ session('otp_mismatch') }}
                                                    </div>
                                                @endif
                                            @endif

                                            <form action="{{ url('resend/code') }}" method="POST">
                                                @csrf

                                                <div class="col-lg-6 text-center">
                                                    <button type="submit" class="btn btn-primary">
                                                        Resend OTP
                                                    </button>
                                                    @if (session('otp_resent'))
                                                        <div class="text-success text-center mb-2">
                                                            {{ session('otp_resent') }}
                                                        </div>
                                                    @endif
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Phone number verification end --}}

                    </div>
                </div>
            </div>
        </div>
        {{-- @endsection --}}
        <!--**********************************
    Content body end
***********************************-->
