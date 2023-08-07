<section class="head">
    <div class="container">
        <h5 class="head-content">
            Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!
            <a href="{{ route('product') }}">ShopNow</a>
        </h5>
    </div>
</section>
<header class="header background">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand logo" href="{{ route('home.index') }}">FournineE</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        Offcanvas
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            </div>
            @if(isset(auth()->guard('admin')->user()->id))
                <div class="icons">
                    <div class="icon-user dropdown">
                        <button class="dropdown-toggle header-icon" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-user">
                            <li>
                                <a class="dropdown-item dropdown-user-item" href="{{ route('admin.logout') }}"><i
                                        class="fa-solid fa-right-from-bracket"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif

        </nav>
    </div>
</header>
