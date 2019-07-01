@extends('layouts.user.app')

@section('content')

  <div class="p-res-show p-res-show-sp">
    <div class="row">
      <!-- slideshow -->
      <div class="w-100 p-res-show--slideshow">
        <swiper :options="swiperOption" class="swiper-box">
          @foreach($restaurant->restaurantImages as $image)
            <swiper-slide>
              <img src="{{ ImageHelper::convertFullImageUrl($image->image->url) }}" class="" style="width: 100%; height: 256px; object-fit: cover;">
            </swiper-slide>
          @endforeach
          <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
          <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
          <!-- <div class="swiper-pagination" slot="pagination"></div> -->
          <!-- <swiper-my-pagination
          :restaurant="{{json_encode($restaurant)}}" /> -->
        </swiper>
      </div>
      <!-- content -->
      <div class="col-md-12 p-res-show--content">
        <!-- info -->
        <div class="p-res-show--info">
          @include('components.user.restaurants.show.info_sp', ['restaurant' => $restaurant])
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

        <!-- sns share -->
        <div class="p-res-show--sns-share">
          <h2>このレストランをシェアする</h2>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
              <div class="mx-auto">

                <div class="fb-share-button" data-href="{{ url()->full() }}" data-layout="button" data-size="small" style="position: relative; top: -4px">
                  <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
                </div>

                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
                <script type="application/javascript" async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                <div class="line-it-button" data-lang="ja" data-type="share-a" data-url="" style="display: none;"></div>

                <div class="heart-icon--wrap" style="display: inline-block; position: relative; font-size: 21px;">
                  @isset($currentUser)
                    <favorite-restaurant
                      :restaurant="{{json_encode($restaurant)}}"
                      :current-user="{{json_encode($currentUser)}}"
                      :default-favorited="{{ json_encode(FavoriteHelper::defaultFavorited($restaurant, $currentUser)) }}"></favorite-restaurant>
                  @endisset
                </div>
              </div>
            </div>
          </div>
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