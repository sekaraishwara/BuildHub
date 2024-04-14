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
                      <div class="right-bar">
                          {{-- <button class="btn-login" data-toggle="modal" data-target="#loginModal">Login</button> --}}
                          <a href="{{ route('login') }}" class="btn-login text-white">Login</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>
