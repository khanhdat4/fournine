<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Google Font link -->
    <link
      href="https://fonts.googleapis.com/css2?family=Nova+Mono&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.admin-header')
    <main id="main" style="margin-top: 5rem;">
        <!-- Dashboard -->
        <section class="dashboard">
          <div class="container">
            <div class="wrapper">
              <div class="dashboard-content d-flex">
                <div
                  class="dashboard-left nav nav-pills"
                  id="v-pills-tab"
                  role="tablist"
                  aria-orientation="vertical"
                >
                  <div class="dashboard-left-item">
                    <div class="dashboard-heading">Products</div>
                    <div class="dashboard-btns">
                      <a href="{{route('admin.product.info')}}" class="nav-link {{(basename(URL::current())=='admin' or basename(URL::current())=='product-info')?'active':''}}">Informations</a>
                      <a href="{{route('admin.product.add')}}" class="nav-link {{basename(URL::current())=='product-add'?'active':''}}">New</a>
                    </div>
                  </div>
                  <div class="dashboard-left-item">
                    <div class="dashboard-heading">Users</div>
                    <div class="dashboard-btns">
                      <a href="{{route('admin.user.info')}}" class="nav-link {{basename(URL::current())=='user-info'?'active':''}}">Informations</a>
                      <a href="{{route('admin.user.add')}}" class="nav-link {{basename(URL::current())=='user-add'?'active':''}}">New</a>
                    </div>
                  </div>
                  <div class="dashboard-left-item">
                    <div class="dashboard-heading">Orders</div>
                    <div class="dashboard-btns">
                        <a href="{{route('admin.order')}}" class="nav-link {{basename(URL::current())=='order'?'active':''}}">Informations</a>
                    </div>
                  </div>
                </div>
                <div class="dashboard-right tab-content" id="v-pills-tabContent">
                  <!-- Section -->
                    @yield('main')
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      @include('partials.footer')
    <x-alert />
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('assets/js/index.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    @yield('js')
</body>
</html>
