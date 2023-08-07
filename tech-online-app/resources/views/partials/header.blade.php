<section class="head">
    <div class="container">
      <h5 class="head-content">
        Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!
        <a href="{{route('product')}}">ShopNow</a>
      </h5>
    </div>
  </section>
  <header class="header background">
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand logo" href="{{route('home.index')}}">FournineE</a>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
              Offcanvas
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body mx-auto nav mobile-nav">
            <ul class="navbar-nav flex-grow-1 pe-3 list-nav">
              <li class="nav-item item">
                <a class="nav-link {{basename(request()->path())?'':'active'}}" aria-current="page" href="{{route('home.index')}}"
                  >Home</a
                >
              </li>
              <li class="nav-item item">
                <a class="nav-link {{basename(request()->path())=='product'?'active':''}}" href="{{route('product')}}">Shop</a>
              </li>
              <li class="nav-item item">
                <a class="nav-link {{basename(request()->path())=='contact'?'active':''}}" href="{{ route('contact') }}">Contact</a>
              </li>
              <li class="nav-item item">
                <a class="nav-link {{basename(request()->path())=='about'?'active':''}}" href="{{ route('about') }}">About</a>
              </li>
              @guest
              <li class="nav-item item">
                <a class="nav-link {{basename(request()->path())=='login'?'active':''}}" href="{{ route('login.perform') }}">Log in</a>
              </li>
              <li class="nav-item item">
                <a class="nav-link {{basename(request()->path())=='register'?'active':''}}" href="{{ route('register.perform') }}">Sign up</a>
              </li>
              @endguest
            </ul>
            <form class="search-box" role="search" method="get" action="{{route('product')}}">
              <input type="text" name="search" value="{{request()->search}}" />
              <button type="submit" class="search-icon">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </form>
          </div>
        </div>
        @auth
        <div class="icons">
            <div class="icon-user dropdown">
              <button
                class="dropdown-toggle header-icon"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fa-solid fa-user"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end dropdown-user">
                <li>
                  <a class="dropdown-item dropdown-user-item" href="{{route('user.show')}}">
                    <i class="fa-solid fa-user"></i> Manage My Account</a
                  >
                </li>
                <li>
                  <a class="dropdown-item dropdown-user-item" href="{{route('user.order')}}"
                    ><i class="fa-solid fa-bag-shopping"></i> My Order</a
                  >
                </li>
                <li>
                  <a class="dropdown-item dropdown-user-item" href="{{ route('logout.perform') }}"
                    ><i class="fa-solid fa-right-from-bracket"></i> Logout</a
                  >
                </li>
              </ul>
            </div>
            <a href="{{route('cart')}}" class="header-icon header-cart-item"
              ><i class="fa-solid fa-cart-shopping"></i
              ><span class="header-cart-count is-show">{{getProductQuantity()}}</span></a
            >
          </div>
        @endauth

      </nav>
    </div>
  </header>
