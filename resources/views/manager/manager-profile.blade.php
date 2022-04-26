@extends("layouts.manager.app")
@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">User Profile</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                                class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a class="dropdown-item"
                                                                                               href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="assets/images/avatars/avatar-1.png" alt="Admin"
                                             class="rounded-circle p-1 bg-primary" width="110">
                                        <div class="mt-3">
                                            <h4>{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</h4>
                                            <p class="text-secondary mb-1">Manager</p>
                                            <p class="text-muted font-size-sm">Address</p>
                                            {{--                                                    <button class="btn btn-primary">Follow</button>--}}
                                            {{--                                                    <button class="btn btn-outline-primary">Message</button>--}}
                                        </div>
                                    </div>
                                    <hr class="my-4"/>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('manager.edit')}}" method="post" enctype="multipart/form-data">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">First Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="first_name"
                                                       value="{{auth()->user()->first_name}}"/>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Last Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="last_name"
                                                       value="{{auth()->user()->last_name}}"/>
                                            </div>
                                        </div>
{{--                                        <div class="row mb-3">--}}
{{--                                            <div class="col-sm-3">--}}
{{--                                                <h6 class="mb-0">Email</h6>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                <input type="text" class="form-control" name="email"--}}
{{--                                                       value="{{auth()->user()->email}}"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" name="phone" maxlength="12"
                                                       value="{{auth()->user()->phone}}"/>
                                            </div>
                                        </div>
{{--                                        <div class="row mb-3">--}}
{{--                                            <div class="col-sm-3">--}}
{{--                                                <h6 class="mb-0">Country</h6>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                <input type="text" class="form-control" name="country"--}}
{{--                                                       value="{{auth()->user()->country}}"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



