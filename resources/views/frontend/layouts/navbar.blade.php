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
                              <select>
                                  <option selected="selected">All Category</option>
                                  <option>watch</option>
                                  <option>mobile</option>
                                  <option>kid’s item</option>
                              </select>
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
                          @if (auth()->user()->role === 'customer')
                              <a href="{{ route('customer.dashboard') }}">Customer
                                  Dashboard</a>
                          @elseif(auth()->user()->role === 'professional')
                              <a href="{{ route('professional.dashboard') }}">Professional Dashboard</a>
                          @elseif(auth()->user()->role === 'vendor')
                              <a href="{{ route('vendor.dashboard') }}">Vendor Dashboard</a>
                          @elseif(auth()->user()->role === 'store')
                              <a href="{{ route('store.dashboard') }}">Store Dashboard</a>
                          @endif
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
                                              <li class="active"><a href="#">Home</a></li>
                                              <li><a href="#">Product</a></li>
                                              <li><a href="#">Service</a></li>
                                              <li><a href="#">Shop<i class="ti-angle-down"></i><span
                                                          class="new">New</span></a>
                                                  <ul class="dropdown">
                                                      <li><a href="shop-grid.html">Shop Grid</a></li>
                                                      <li><a href="cart.html">Cart</a></li>
                                                      <li><a href="checkout.html">Checkout</a></li>
                                                  </ul>
                                              </li>
                                              <li><a href="#">Pages</a></li>
                                              <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                                  <ul class="dropdown">
                                                      <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a>
                                                      </li>
                                                  </ul>
                                              </li>
                                              <li><a href="contact.html">Contact Us</a></li>
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
