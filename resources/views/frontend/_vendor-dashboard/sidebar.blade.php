<div class="col-lg-3 col-md-4 col-12 mb-5">
    <div class="shop-sidebar">
        <!-- Single Widget -->
        <div class="single-widget category">
            <h3 class="title">Vendor</a></h3>
            <ul class="categor-list">
                <li><a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('vendor.profile') }}">Profile</a></li>
                <li><a href="{{ route('vendor.service.order') }}">Invoice</a></li>
                <li><a href="{{ route('vendor.service') }}">Service</a></li>
                <li><a href="{{ route('vendor.portfolio') }}">Portfolio</a></li>
                {{-- <li><a href="#">History</a></li> --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="text-danger"
                            onclick="event.preventDefault();
                    this.closest('form').submit();"
                            href="{{ route('logout') }}">Logout</a>
                    </form>
                </li>
            </ul>
        </div>
        <!--/ End Single Widget -->
    </div>
</div>
