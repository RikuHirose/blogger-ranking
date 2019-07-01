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
    </div>
  </div>
</div>