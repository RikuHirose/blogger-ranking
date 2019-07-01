@extends('layouts.user.app')

@section('content')

  <div class="p-res-show">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('restaurants.show', $restaurant) }}
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- sidebar -->
      @include('components.user.sidebar.restaurants.show')
      <!-- content -->
      <div class="col-md-10 p-res-show--content">
        @include('components.user.restaurants.show.info', ['restaurant' => $restaurant])

        <!-- slideshow -->
        <div class="w-100 p-res-show--slideshow">
          <swiper :options="swiperOption" class="swiper-box">
            @foreach($restaurant->restaurantImages as $image)
              <swiper-slide>
                <img src="{{ ImageHelper::convertFullImageUrl($image->image->url) }}" class="" style="width: 760px; height: 400px; object-fit: cover;">
              </swiper-slide>
            @endforeach
            <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
            <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
            <!-- <div class="swiper-pagination" slot="pagination"></div> -->
            <!-- <swiper-my-pagination
            :restaurant="{{json_encode($restaurant)}}" /> -->
          </swiper>
        </div>

        <!-- description -->
        <div id="res-description" class="p-res-show--description">
          <h2>{{ $restaurant->description_title }}</h2>
          <p>
            {{ $restaurant->description }}
          </p>
        </div>

        <!-- show detail info -->
        <div id="res-detail-info" class="p-res-show--detail-info">
          <h2>店舗情報</h2>
            @include('components.user.restaurants.show.detailInfo', ['restaurant' => $restaurant])
        </div>

        <!-- google map -->
        <div class="p-res-show--map">
          <gmap
            :restaurant="{{json_encode($restaurant)}}" />
        </div>

        <!-- recommend restaurants -->
        <div id="res-detail-info" class="p-res-show--recommend-restaurants w-100">
          <h2>オススメのレストラン</h2>
          <div class="row">
            <swiper :options="swiperOptionRecoCard">
              @foreach($recommendRestaurants as $restaurant)
                <swiper-slide>
                  @include('components.user.restaurants.recoCard', ['restaurant' => $restaurant])
                </swiper-slide>
              @endforeach
              <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
              <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
            </swiper>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection