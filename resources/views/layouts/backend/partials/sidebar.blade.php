<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="mdi mdi-gauge"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.setting') }}" aria-expanded="false">
                        <i class="mdi mdi-account-check"></i>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.category.index') }}" aria-expanded="false">
                        <i class="mdi mdi-table"></i>
                        <span class="hide-menu">Category</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/brand*') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.brand.index') }}" aria-expanded="false">
                        <i class="mdi mdi-table"></i>
                        <span class="hide-menu">Brand</span>
                    </a>
                </li>


                <li class="{{ Request::is('admin/product*') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.product.index') }}" aria-expanded="false">
                        <i class="mdi mdi-table"></i>
                        <span class="hide-menu">Products</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/order*') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.order.index') }}" aria-expanded="false">
                        <i class="mdi mdi-table"></i>
                        <span class="hide-menu">Orders</span>
                    </a>
                </li>


                <li class="{{ Request::is('admin/contact*') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.contact.index') }}" aria-expanded="false">
                        <i class="mdi mdi-table"></i>
                        <span class="hide-menu">Contact</span>
                    </a>
                </li>


                <li class="{{ Request::is('admin/slider*') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.slider.index') }}" aria-expanded="false">
                        <i class="mdi mdi-table"></i>
                        <span class="hide-menu">Slider</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/division*') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.division.index') }}" aria-expanded="false">
                        <i class="mdi mdi-table"></i>
                        <span class="hide-menu">Division</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/district*') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.district.index') }}" aria-expanded="false">
                        <i class="mdi mdi-table"></i>
                        <span class="hide-menu">District</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/payment*') ? 'active' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.payment.index') }}" aria-expanded="false">
                        <i class="mdi mdi-table"></i>
                        <span class="hide-menu">Payment Method</span>
                    </a>
                </li>

            </ul>
            <div class="text-center m-t-30">

                <a class="btn waves-effect waves-light btn-warning hidden-md-down" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
    <!-- End Bottom points-->
</aside>