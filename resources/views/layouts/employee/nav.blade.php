<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('employee.profile') }}">
                        <div class="parent-icon"><i class="bx bx-user-circle"></i>
                        </div>
                        <div class="menu-title">@lang('main.user_profile')</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('qrcode.generate') }}">
                        <div class="parent-icon"><i class="lni lni-frame-expand"></i>
                        </div>
                        <div class="menu-title">@lang('main.qr')</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tips.balance') }}">
                        <div class="parent-icon"><i class="lni lni-money-location"></i>
                        </div>
                        <div class="menu-title">@lang('main.balance')</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
