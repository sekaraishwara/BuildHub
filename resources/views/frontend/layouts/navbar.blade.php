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
                  <div class="col-lg-2 col-md-2 col-12 ">
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
                                                  <li> <a href="{{ route('customer.history-transaction') }}">History
                                                          Transaction</a></li>
                                                  <li> <a href="{{ route('customer.building-checklist') }}">Building
                                                          Checklist</a></li>
                                                  <li> <a href="{{ route('customer.payment') }}">Payment</a></li>
                                                  <li> <a href="{{ route('customer.profile') }}">Profile</a></li>
                                              @elseif(auth()->user()->role === 'professional')
                                                  <li> <a href="{{ route('professional.dashboard') }}">Dashboard</a></li>
                                              @elseif(auth()->user()->role === 'vendor')
                                                  <li> <a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                                              @elseif(auth()->user()->role === 'store')
                                                  <li> <a href="{{ route('store.dashboard') }}">Dashboard</a></li>
                                                  <li> <a href="{{ route('store.chat') }}">Chat</a></li>
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
                              @if (auth()->user()->role === 'customer')
                                  <div class="sinlge-bar shopping">
                                      <a href="{{ route('customer.cart') }}" class="single-icon"><i class="ti-bag"></i>
                                          <span id="total-count" class="total-count font-weight-bold"></span></a>
                                      <!-- Shopping Item -->

                                      <!--/ End Shopping Item -->
                                  </div>
                                  <script>
                                      function getTotalItemCount() {
                                          var xhr = new XMLHttpRequest();
                                          var url = '/customer/cart/count-items';

                                          xhr.open('GET', url, true);

                                          xhr.onreadystatechange = function() {
                                              if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                                  var response = JSON.parse(xhr.responseText);
                                                  document.getElementById('total-count').textContent = response.totalItemCount;
                                              }
                                          };
                                          xhr.send();
                                      }
                                      window.onload = getTotalItemCount;
                                  </script>
                              @endif

                          </div>
                      @endauth
                  </div>
              </div>
          </div>
      </div>
      <!-- Header Inner -->
      <div class="header-inner">
          <div class="container">
              <div class="cat-nav-head">
                  <div class="row justify-content-center">

                      <div class="col-lg-9 col-12">
                          <div class="menu-area">
                              <!-- Main Menu -->
                              <nav class="navbar navbar-expand-lg">
                                  <div class="navbar-collapse ">
                                      <div class="nav-inner">
                                          <ul class="nav main-menu menu navbar-nav">
                                              <li><a href="{{ url('/') }}">Home</a></li>
                                              <li><a href="{{ route('vendor') }}">Vendor</a></li>
                                              <li><a href="{{ route('professional') }}">Professional</a></li>
                                              <li><a href="{{ route('store') }}">Store</a></li>
                                              <li><a href="#">Event</a></li>
                                              <li><a href="#">Blog</a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </nav>
                              <!--/ End Main Menu -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--/ End Header Inner -->
  </header>

  {{-- <div class="modal fade m-0 p-0" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
      <div class="modal-dialog ">
          <div class="modal-content">
              <div class="modal-header border-0">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body ">
                  <x-auth-session-status class="mb-4" :status="session('status')" />
                  <button class="btn-login-google text-center w-100 my-3" type="submit"><i
                          class="fa fa-google me-2"></i>
                      Login
                      with google</button>
              </div>

              <p class="text-center p-0 m-0">or login with</p>

              <form class="px-3" id="loginForm" method="POST" action="{{ route('login') }}">
                  @csrf

                  <!-- Email Address -->
                  <div class="mb-3">
                      <label for="email" class="form-label">{{ __('Email') }}</label>
                      <input id="email" class="form-control" type="email" name="email"
                          value="{{ old('email') }}" required autofocus autocomplete="username">
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>

                  <!-- Password -->
                  <div class="mb-3">
                      <label for="password" class="form-label">{{ __('Password') }}</label>
                      <input id="password" class="form-control" type="password" name="password" required
                          autocomplete="current-password">
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>

                  <div class="d-flex justify-content-between">
                      <div class="form-check mb-3">
                          <input id="remember_me" class="form-check-input" type="checkbox" name="remember">
                          <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                      </div>


                      <div class="text-end">
                          @if (Route::has('password.request'))
                              <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                          @endif
                      </div>
                  </div>

                  <div class="text-center mt-3">
                      <button class="btn-login w-100">Masuk</button>
                  </div>
              </form>
              <div class="modal-footer mx-auto border-0 my-3">
                  <p>Belum punya akun? <a href="/register" class="text-primary"> daftar sekarang</a></p>
              </div>
          </div>
      </div>
  </div> --}}
  <!--/ End Header -->

  {{-- @if ($errors->any())
      <script type="text/javascript">
          $(window).on('load', function() {
              $('#loginModal').modal('show');
          });
      </script>
  @endif --}}

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
