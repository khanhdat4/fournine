@extends('master')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endsection
@section('title')
    About Us
@endsection
@section('main')
<main id="main">
    <section class="about mt-2">
      <div class="about-img">
        <img src="{{asset('images/about-bg.png')}}" alt="" />
      </div>
      <div class="container">
        <div class="about-wrapper">
          <div class="about-heading">
            <div class="about-heading-content">
              <h2 class="about-title">Our Story</h2>
              <p class="about-desc">
                Launced in 2015, Fournine is South Asia's premier online
                shopping makterplace with an active presense in Bangladesh.
                Supported by wide range of tailored marketing, data and
                service solutions, Fournine has 10,500 sallers and 300 brands
                and serves 3 millioons customers across the region.
              </p>
              <p class="about-desc">
                Fournine has more than 1 Million products to offer, growing
                at a very fast. Fournine offers a diverse assotment in
                categories ranging from consumer.
              </p>
            </div>
          </div>

          <div class="statistical">
            <div
              class="statistical-wrapper row row-cols-2 row-cols-lg-4 g-2 g-lg-3"
            >
              <div class="statistical-col">
                <div class="statistical-item">
                  <div class="icon-circle statistical-icon">
                    <i class="fa-solid fa-house"></i>
                  </div>
                  <div class="statistical-desc">10.5k</div>
                  <div class="statistical-title">Sallers active our site</div>
                </div>
              </div>
              <div class="statistical-col">
                <div class="statistical-item">
                  <div class="icon-circle statistical-icon">
                    <i class="fa-solid fa-dollar-sign"></i>
                  </div>
                  <div class="statistical-desc">33k</div>
                  <div class="statistical-title">Mopnthly Produduct Sale</div>
                </div>
              </div>
              <div class="statistical-col">
                <div class="statistical-item">
                  <div class="icon-circle statistical-icon">
                    <i class="fa-solid fa-bag-shopping"></i>
                  </div>
                  <div class="statistical-desc">45.5k</div>
                  <div class="statistical-title">
                    Customer active in our site
                  </div>
                </div>
              </div>
              <div class="statistical-col">
                <div class="statistical-item">
                  <div class="icon-circle statistical-icon">
                    <i class="fa-solid fa-sack-dollar"></i>
                  </div>
                  <div class="statistical-desc">25k</div>
                  <div class="statistical-title">
                    Anual gross sale in our site
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="service">
            <div class="service-item">
              <div class="icon-circle service-icon">
                <i class="fa-solid fa-truck"></i>
              </div>
              <div class="service-title">FREE AND FAST DELIVERY</div>
              <div class="service-desc">
                Free delivery for all orders over $140
              </div>
            </div>
            <div class="service-item">
              <div class="icon-circle service-icon">
                <i class="fa-solid fa-headphones"></i>
              </div>
              <div class="service-title">24/7 CUSTOMER SERVICE</div>
              <div class="service-desc">Friendly 24/7 customer support</div>
            </div>
            <div class="service-item">
              <div class="icon-circle service-icon">
                <i class="fa-solid fa-clipboard-check"></i>
              </div>
              <div class="service-title">MONEY BACK GUARANTEE</div>
              <div class="service-desc">We reurn money within 30 days</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <x-alert/>
@endsection
