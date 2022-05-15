@extends("layouts.employee.app")
@section("wrapper")

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">@lang('main.user_profile')</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('main.balance')</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">@lang('main.settings')</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->



            <!-- Section: Pricing table -->
            <div class="pricing-table">
                <div class="row row-cols-1 row-cols-lg-3">
                    <!-- Free Tier -->
                    <div class="col">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-header bg-danger py-3">
                                <h5 class="card-title text-white text-uppercase text-center">@lang('main.money')</h5>
                                <h6 class="card-price text-white text-center">${{ $userMoney }}<span class="term"></span></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Plus Tier -->
                    <div class="col">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-header bg-primary py-3">
                                <h5 class="card-title text-white text-uppercase text-center">@lang('main.paid')</h5>
                                @if(isset($userMoneyPaid))
                                <h6 class="card-price text-white text-center">${{$userMoneyPaid}}<span class="term"></span></h6>
                                @else
                                <h6 class="card-price text-white text-center">$0<span class="term"></span></h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Pro Tier -->
                    <div class="col">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-header bg-warning py-3">
                                    <h5 class="card-title text-dark text-uppercase text-center">@lang('main.card')</h5>
                                    @if($countUserCards > 0 and $userMoney > 0)
                                    <h1 class="card-price text-white text-center"><span class="term"> <a href="{{ url('/withdraw-tips') }}" type="submit" class="btn btn-dark px-5" value=""/>@lang('main.withdraw')</span></h1></a>
                                    @elseif($countUserCards > 0 and $userMoney == 0)
                                    <h6 class="card-price text-white text-center">@lang('main.not_enough_money')<span class="term"></span></h6>
                                    @else
                                    <h1 class="card-price text-white text-center"><span class="term"> <a href="{{ url('/add-card') }}" type="submit" class="btn btn-dark px-5" value=""/>@lang('main.add_card')</span></h1></a>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    @if (count($tipsArray))
                        <div class="card-body">
                            <table class="table mb-0 table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@lang('main.amount')</th>
                                    <th scope="col">@lang('main.currency')</th>
                                    <th scope="col">@lang('main.time')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tipsArray as $tips)
                                    <tr>
                                        <th scope="row">{{ $tips->id }}</th>
                                        <td>{{ $tips->amount }}</td>
                                        <td>{{ $tips->currency_code }}</td>
                                        <td>{{ $tips->time }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <!--end row-->
            </div>
        </div>
    </div>

{{--    <div class="page-wrapper">--}}
{{--        <div class="page-content">--}}
{{--            <!--breadcrumb-->--}}
{{--            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">--}}
{{--                <div class="breadcrumb-title pe-3">User Profile</div>--}}
{{--                <div class="ps-3">--}}
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb mb-0 p-0">--}}
{{--                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">Balance</li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--                <div class="ms-auto">--}}
{{--                    <div class="btn-group">--}}
{{--                        <button type="button" class="btn btn-primary">Settings</button>--}}
{{--                        <button type="button"--}}
{{--                                class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"--}}
{{--                                data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span>--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a class="dropdown-item"--}}
{{--                                                                                               href="javascript:;">Action</a>--}}
{{--                            <a class="dropdown-item" href="javascript:;">Another action</a>--}}
{{--                            <a class="dropdown-item" href="javascript:;">Something else here</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item" href="javascript:;">Separated link</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--end breadcrumb-->--}}
{{--            <div class="pricing-table center">--}}
{{--                <div class="row row-cols-1 row-cols-lg-3">--}}
{{--                    <!-- Free Tier -->--}}
{{--                    <div class="col">--}}
{{--                        <div class="card mb-5 mb-lg-0">--}}
{{--                            <div class="card-header bg-primary py-3">--}}
{{--                                <h5 class="card-title text-white text-uppercase text-center">Balance</h5>--}}
{{--                                <h6 class="card-price text-white text-center">$ {{ $userMoney[0]->money }} <span class="term"></span></h6>--}}
{{--                            </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="pricing-table center">--}}
{{--                <div class="row row-cols-1 row-cols-lg-3">--}}
{{--                    <!-- Free Tier -->--}}
{{--                    <div class="col">--}}
{{--                        <div class="card mb-5 mb-lg-0">--}}
{{--                            <div class="card-header bg-primary py-3">--}}
{{--                                <h5 class="card-title text-white text-uppercase text-center">Balance</h5>--}}
{{--                                <h6 class="card-price text-white text-center">$ {{ $userMoney[0]->money }} <span class="term"></span></h6>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
@endsection



