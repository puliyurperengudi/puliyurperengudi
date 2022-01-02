<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="https://vemto.app/favicon.png" alt="Vemto Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">Temple</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            Home / வீடு
                        </p>
                    </a>
                </li>
                    @can('view-any', App\Models\TaxList::class)
                        <li class="nav-item">
                            <a href="{{ route('tax-lists.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Tax List / வரி பட்டியல்</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\TaxPayers::class)
                        <li class="nav-item">
                            <a href="{{ route('all-tax-payers.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Pay tax / வரி செலுத்துமிடம் </p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Donation::class)
                        <li class="nav-item">
                            <a href="{{ route('donations.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Donations / நன்கொடை</p>
                            </a>
                        </li>
                    @endcan
                    @can('view-any', App\Models\Expense::class)
                        <li class="nav-item">
                            <a href="{{ route('expenses.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Expenses List / செலவுகள் பட்டியல்</p>
                            </a>
                        </li>
                    @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                            Masters
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\User::class)
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Users / பணியாளர்</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Caste::class)
                            <li class="nav-item">
                                <a href="{{ route('castes.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Castes / சாதிகள்</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Kootam::class)
                            <li class="nav-item">
                                <a href="{{ route('kootams.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Kootams / குலம்</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Vagera::class)
                            <li class="nav-item">
                                <a href="{{ route('vageras.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Vageras / வகையாரா</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\TempleUser::class)
                            <li class="nav-item">
                                <a href="{{ route('temple-users.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Temple Users / வரியாலர்கள்</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\ExpenseType::class)
                            <li class="nav-item">
                                <a href="{{ route('expense-types.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Expense Types / செலவு வகைகள்</p>
                                </a>
                            </li>
                            @endcan
                    </ul>
                </li>

                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-key"></i>
                        <p>
                            Roles and Permissions
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', Spatie\Permission\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcan

                        @can('view-any', Spatie\Permission\Models\Permission::class)
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif
                @endauth

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
