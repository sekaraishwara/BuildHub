<div class="col-lg-3 col-md-4 col-12 mb-5">
    <div class="shop-sidebar">
        <!-- Single Widget -->
        <div class="single-widget category">
            <h3 class="title">Customer</a></h3>
            <ul class="categor-list">
                <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('customer.profile') }}">Profile</a></li>
                <li><a href="{{ route('notification') }}">Notification</a></li>
                <li><a href="{{ route('customer.order') }}">My Order</a></li>
                <li><a href="{{ route('customer.chat') }}">Chat</a></li>
                <li><a href="">Building Checklist</a></li>
                <li><a href="">History Transaction</a></li>
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
