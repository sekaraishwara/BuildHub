  <!-- Header -->
  <header class="header shop">
      <div class="middle-inner">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-2 col-md-2 col-12">
                      <!-- Logo -->
                      <div class="logo m-0">
                          <a href="{{ url('./') }}" class="navbar-brand">BUILDHUB</a>
                      </div>
                      <!--/ End Logo -->
                      <!-- Search Form -->
                      <div class="search-top">
                          <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                          <!-- Search Form -->
                          <div class="search-top">
                              <form class="search-form">
                                  <input type="text" placeholder="Search here..." name="search">
                                  <button value="search" type="submit"><i class="ti-search"></i></button>
                              </form>
                          </div>
                          <!--/ End Search Form -->
                      </div>
                      <!--/ End Search Form -->
                      <div class="mobile-nav"></div>
                  </div>
                  <div class="col-lg-8 col-md-7 col-12">
                      <div class="search-bar-top">
                          <div class="search-bar">
                              <form>
                                  <input name="search" placeholder="Search Products Here....." type="search">
                                  <button class="btnn"><i class="ti-search"></i></button>
                              </form>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-12 ">
                      @guest
                          <div class="right-bar">
                              <a href="{{ route('login') }}" class="btn-login text-white">Login</a>
                          </div>
                      @endguest
                      @auth
                          <div class="right-bar">

                              <div class="sinlge-bar">
                                  <a href="{{ route('notification') }}" class="single-icon"><i class="fa fa-bell-o"
                                          aria-hidden="true"></i></a>
                              </div>
                              {{-- <div class="sinlge-bar">
                                  <a href="#" class="single-icon"><i class="fa fa-wechat" aria-hidden="true"></i></a>
                              </div> --}}
                              <div class="sinlge-bar shopping" data-toggle="dropdown">
                                  <a href="#" class="single-icon"><i class="fa fa-user-circle-o"
                                          aria-hidden="true"></i></a>
                                  <div class="shopping-item dropdown">
                                      <div class="dropdown">
                                          <ul class="list">
                                              <li>
                                                  <div class="d-flex justify-content-start align-items-center">
                                                      <img src="{{ asset('default-uploads/avatar.jpg') }}" width="40px"
                                                          alt="">
                                                      <div class="row ml-1">
                                                          <p class="font-weight-bold">{{ auth()->user()->name }}</p>
                                                          <small class="mx-2"> 300 point</small>
                                                      </div>
                                                  </div>
                                              </li>
                                              <hr class="my-2 p-0">
                                              {{-- Menu options based on user role --}}
                                              @if (auth()->user()->role === 'customer')
                                                  <li> <a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                                  <li> <a href="{{ route('customer.chat') }}">Chat</a></li>
                                                  <li> <a href="{{ route('customer.dashboard') }}">Item Saved</a></li>
                                                  <li> <a href="{{ route('customer.payment') }}">Payment</a></li>
                                                  <li> <a href="{{ route('customer.profile') }}">Profile</a></li>
                                              @elseif(auth()->user()->role === 'professional')
                                                  <li> <a href="{{ route('professional.dashboard') }}">Dashboard</a></li>
                                              @elseif(auth()->user()->role === 'vendor')
                                                  <li> <a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                                              @elseif(auth()->user()->role === 'store')
                                                  <li> <a href="{{ route('store.dashboard') }}">Dashboard</a></li>
                                              @endif
                                              {{-- Logout --}}
                                              <li class="text-danger">
                                                  <form method="POST" action="{{ route('logout') }}">
                                                      @csrf
                                                      <a onclick="event.preventDefault(); this.closest('form').submit();"
                                                          href="{{ route('logout') }}">Logout</a>
                                                  </form>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="sinlge-bar shopping">
                                  <a href="#" class="single-icon"><i class="ti-bag"></i> <span
                                          class="total-count">2</span></a>
                                  <!-- Shopping Item -->
                                  <div class="shopping-item">
                                      <div class="dropdown-cart-header">
                                          <span>2 Items</span>
                                          <a href="{{ route('customer.cart') }}">View Cart</a>
                                      </div>
                                      <ul class="shopping-list">
                                          <li>
                                              <a href="#" class="remove" title="Remove this item"><i
                                                      class="fa fa-remove"></i></a>
                                              <a class="cart-img" href="#"><img
                                                      src="https://via.placeholder.com/70x70" alt="#"></a>
                                              <h4><a href="#">Woman Ring</a></h4>
                                              <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                          </li>
                                          <li>
                                              <a href="#" class="remove" title="Remove this item"><i
                                                      class="fa fa-remove"></i></a>
                                              <a class="cart-img" href="#"><img
                                                      src="https://via.placeholder.com/70x70" alt="#"></a>
                                              <h4><a href="#">Woman Necklace</a></h4>
                                              <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                          </li>
                                      </ul>
                                      <div class="bottom">
                                          <div class="total">
                                              <span>Total</span>
                                              <span class="total-amount">$134.00</span>
                                          </div>
                                          {{-- <a href="{{ route('customer.checkout') }}" class="btn animate">Checkout</a> --}}
                                      </div>
                                  </div>
                                  <!--/ End Shopping Item -->
                              </div>
                          </div>
                      @endauth
                  </div>
              </div>
          </div>
      </div>
  </header>

  <script>
      document.querySelector('.sinlge-bar.shopping').addEventListener('click', function(event) {
          event.stopPropagation();
          var dropdown = this.querySelector('.shopping-item.dropdown-menu');
          dropdown.classList.toggle('show'); //
      });

      document.addEventListener('click', function(event) {
          var dropdown = document.querySelector('.shopping-item.dropdown-menu');
          if (dropdown.classList.contains('show') && !event.target.closest('.sinlge-bar.shopping')) {
              dropdown.classList.remove('show');
          }
      });
  </script>
