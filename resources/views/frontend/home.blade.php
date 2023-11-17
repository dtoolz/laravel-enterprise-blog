  @extends('frontend.layouts.master')


  @section('content')
      <!-- Breaking news  carousel-->
      @include('frontend.home-components.breaking-news')
      <!-- End Breaking news carousel -->

      <!-- Hero news -->
      @include('frontend.home-components.hero-slider')
      <!-- End Hero news -->

      @if ($advert->home_top_bar_advert_status == 1)
          <div class="large_add_banner">
              <div class="container">
                  <div class="row">
                      <div class="col-9 text-center mx-auto">
                        <a href="{{ $advert->home_top_bar_advert_url }}">
                            <img src="{{ asset(@$advert->home_top_bar_advert) }}" class="img-fluid" alt="adds">
                        </a>
                      </div>
                  </div>
              </div>
          </div>
      @endif

      <!-- Popular news category -->
      @include('frontend.home-components.main-news')
      <!-- End Popular news category -->
  @endsection
