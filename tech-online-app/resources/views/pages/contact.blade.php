@extends('master')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/contact.css')}}">
@endsection
@section('title')
    Contact Us
@endsection
@section('main')
<main id="main">
    <section class="contact mt-2">
      <div class="container">
        <div class="contact-wrapper row">
          <div class="col-lg-4 contact-left">
            <div class="contact-left-content">
              <div class="content">
                <div class="content-heading">
                  <span class="content-icon"
                    ><i class="fa-solid fa-phone"></i
                  ></span>
                  <h3 class="content-title">Call To Us</h3>
                </div>
                <p class="content-desc">
                  We are available 24/7, 7 days a week.<br />Phone:
                  +8801611112222
                </p>
              </div>
              <div class="content">
                <div class="content-heading">
                  <span class="content-icon"
                    ><i class="fa-solid fa-envelope"></i
                  ></span>
                  <h3 class="content-title">Write To US</h3>
                </div>
                <p class="content-desc">
                  Fill out our form and we will contact you within 24
                  hours.<br />Emails: customer@exclusive.com<br />Emails:
                  support@exclusive.com
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 contact-right">
            <div class="contact-right-content">
              <!-- FORM contact -->
              <form action="" class="contact-form" method="">
                <div class="contact-inputs">
                  <input
                    type="text"
                    placeholder="Your Name"
                    required
                    name="contact-name"
                    autofocus
                  />
                  <input
                    type="email"
                    placeholder="Your Email"
                    required
                    name="contact-email"
                  />
                  <input
                    type="tel"
                    placeholder="Your Phone"
                    required
                    name="contact-phone"
                  />
                </div>
                <textarea
                  class="contact-massage"
                  name="contact-massage"
                  placeholder="Your Massage"
                  required
                ></textarea>
                <button class="red-btn contact-btn" type="submit">
                  Send Massage
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
