<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/alliance.png') }}" class="logo-icon" alt="logo icon" style="width:80%;">
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <br>
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        @permission('ussd-request-read')
            <li>
                <a href="{{ route('ussd-request.index') }}">
                    <div class="parent-icon"><i class="bx bx-dialpad"></i>
                    </div>
                    <div class="menu-title">USSD Request</div>
                </a>
            </li>
        @endpermission
        @permission('covernote-verification-read')
            <li>
                <a href="{{ route('cover_note_verification.index') }}">
                    <div class="parent-icon"><i class='bx bx-check-shield'></i>
                    </div>
                    <div class="menu-title">Cover Verification</div>
                </a>
            </li>
        @endpermission
        @permission('quotations-read')
            <li>
                <a href="{{ route('quotations.index') }}">
                    <div class="parent-icon"><i class='bx bx-taxi'></i>
                    </div>
                    <div class="menu-title">Motor Insurance</div>
                </a>
            </li>
        @endpermission

        {{-- <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-taxi"></i>
                </div>
                <div class="menu-title">Motor Insurance</div>
            </a>
            <ul>
                <li> <a href="{{ route('quotations.index') }}"><i class='bx bx-radio-circle'></i>Non Fleet</a>
                </li>
                <li> <a href="{{ route('fleet.index') }}"><i class='bx bx-radio-circle'></i>With Fleet</a>
                </li>
            </ul>
        </li> --}}
        @permission('claim-read')
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-clipboard'></i>
                    </div>
                    <div class="menu-title">Claims</div>
                </a>
                <ul>
                    @permission('claim-notification-read')
                        <li> <a href="{{ route('claim.notification.index') }}"><i
                                    class='bx bx-radio-circle'></i>Notifications</a>
                        </li>
                    @endpermission
                    @permission('claim-intimation-read')
                        <li> <a href="{{ route('claim.intimation.index') }}"><i class='bx bx-radio-circle'></i>Intimation</a>
                        </li>
                    @endpermission
                    @permission('claim-assessment-read')
                        <li> <a href="{{ route('claim.assessment.index') }}"><i class='bx bx-radio-circle'></i>Assessment</a>
                        </li>
                    @endpermission
                    @permission('claim-discharge-voucher-read')
                        <li> <a href="{{ route('claim.discharge-voucher.index') }}"><i class='bx bx-radio-circle'></i>Discharge
                                Voucher</a>
                        </li>
                    @endpermission
                    @permission('claim-payment-read')
                        <li> <a href="{{ route('claim.payment.index') }}"><i class='bx bx-radio-circle'></i>Payments</a>
                        </li>
                    @endpermission
                    @permission('claim-rejection-read')
                        <li> <a href="{{ route('claim.rejection.index') }}"><i class='bx bx-radio-circle'></i>Rejections</a>
                        </li>
                    @endpermission

                </ul>
            </li>
        @endpermission
        @permission('payments-read')
            <li>
                <a href="{{ route('payments.index') }}">
                    <div class="parent-icon"><i class='bx bx-coin'></i>
                    </div>
                    <div class="menu-title">Payments</div>
                </a>
            </li>
        @endpermission
        @permission('user-management-read')
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"> <i class="bx bx-cog"></i>
                    </div>
                    <div class="menu-title">Users Management</div>
                </a>
                <ul>
                    @permission('role-read')
                        <li> <a href="{{ route('users.roles.index') }}"><i class='bx bx-radio-circle'></i>Roles</a>
                        </li>
                    @endpermission
                    @permission('permission-read')
                        <li> <a href="{{ route('users.permissions.index') }}"><i class='bx bx-radio-circle'></i>Permissions</a>
                        </li>
                    @endpermission
                    @permission('role-read')
                        <li> <a href="{{ route('users.roles-assignment.index') }}"><i class='bx bx-radio-circle'></i>Roles &
                                Permissions Assignment
                            </a>
                        </li>
                    @endpermission
                    @permission('users-read')
                        <li> <a href="{{ route('users.index') }}"><i class='bx bx-radio-circle'></i>Users
                            </a>
                        </li>
                    @endpermission

                </ul>
            </li>
        @endpermission

        <li class="{{ request()->routeIs(['profile.*', 'currencies.*', 'taxes.', 'products.*']) ? 'mm-active' : '' }}">
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
            <ul
                class="{{ request()->routeIs(['profile.*', 'currencies.*', 'taxes.', 'products.*']) ? 'mm-collapse mm-show' : '' }}">
                <li class="{{ request()->routeIs('profile.*') ? 'mm-active' : '' }}"> <a
                        href="{{ route('profile.index') }}"><i class='bx bx-radio-circle'></i>Profile</a></li>
                @permission('currency-read')
                    <li class="{{ request()->routeIs('currencies.*') ? 'mm-active' : '' }}"> <a
                            href="{{ route('currencies.index') }}"><i class='bx bx-radio-circle'></i>Currencies</a></li>
                @endpermission
                @permission('tax-read')
                    <li class="{{ request()->routeIs('taxes.*') ? 'mm-active' : '' }}"> <a
                            href="{{ route('taxes.index') }}"><i class='bx bx-radio-circle'></i>Taxes</a></li>
                @endpermission
                @permission('product-read')
                    <li class="{{ request()->routeIs('products.*') ? 'mm-active' : '' }}"> <a
                            href="{{ route('products.index') }}"><i class='bx bx-radio-circle'></i>Insurance Products</a>
                    </li>
                @endpermission
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
