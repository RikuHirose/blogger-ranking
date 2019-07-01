<div class="c-res-show-info">
  <div class="c-res-show-info__name">
    <h1>{{ $restaurant->name }}</h1>
  </div>

  <div class="c-res-show-info__content">
    <div class="c-res-show-info__content__top">
      <div class="row">
        <div class="col-md-12">
          @include('components.user.restaurants.adminEvaluate', ['restaurant' => $restaurant])
          <span class="m-tag">
            {{ $restaurant->category->name }}
          </span>
          <span class="m-tag m-tag__situation">
            {{ $restaurant->situation->name }}
          </span>
        </div>
      </div>
    </div>
    <div class="c-res-show-info__content__bottom">
      <div class="" style="display: table-cell;">
        <span class="fa-location">
          <span>
            {{ $restaurant->nearest_station }}徒歩{{ $restaurant->nearest_station_minutes }}分
          </span>
        </span>

        @if(!is_null($restaurant->lunch_price_zone))
          <span class="fa-lunch">
            <span>
              ~{{ $restaurant->lunch_price_zone }}円
            </span>
          </span>
        @endif

        <span class="fa-dinner">
          <span>
            ~{{ $restaurant->dinner_price_zone }}円
          </span>
        </span>
      </div>

      <div class="mt-2" style="display: table-cell; text-align: right; margin-top: 8px;">

        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="mx-auto text-right">

              <div class="fb-share-button" data-href="{{ url()->full() }}" data-layout="button" data-size="small" style="top: -4px;">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
              </div>

              <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
              <script type="application/javascript" async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

              <div class="line-it-button" data-lang="ja" data-type="share-a" data-url="" style="display: none;"></div>

              <div class="heart-icon--wrap">
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
    </div>
  </div>
</div>