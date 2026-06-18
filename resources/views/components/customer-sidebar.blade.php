<section class="padding-small">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="customer-sidebar col-xl-3 col-lg-4 mb-md-5">
                <div class="customer-profile">
                    <a href="#" class="d-inline-block"> <img src="{{ asset('img/default.webp') }}"
                            class="img-fluid rounded-circle customer-image"> </a>

                    <h5>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>

                    <p class="text-muted text-small"> {{ auth()->user()->city }} </p>
                </div>

                <nav class="list-group customer-nav">

                    <a href="{{ route('customerOrders') }}"
                        class="list-group-item d-flex justify-content-between align-items-center {{ request()->routeIs('customerOrders') ? 'active' : '' }}">
                        <span>
                            <span class="icon icon-bag"></span> Orders
                        </span>
                    </a>

                    <a href="{{ route('customerAccount') }}"
                        class="list-group-item d-flex justify-content-between align-items-center {{ request()->routeIs('customerAccount') ? 'active' : '' }}">
                        <span>
                            <span class="icon icon-profile"></span> Profile
                        </span>
                    </a>

                    <a href="{{ route('customerAddresses') }}"
                        class="list-group-item d-flex justify-content-between align-items-center {{ request()->routeIs('customerAddresses') ? 'active' : '' }}">
                        <span>
                            <span class="icon icon-map"></span> Addresses
                        </span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit"
                            class="list-group-item d-flex justify-content-between align-items-center w-100"
                            style="border:0; background:transparent;">
                            <span>
                                <span class="fa fa-sign-out"></span> Log out
                            </span>
                        </button>
                    </form>

                </nav>
            </div>