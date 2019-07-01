<div class="row mb-3 c-res-index-card">

  <div class="col-md-7 c-res-index-card--img__wrap">
    <a href="{{ route('restaurants.show', [$restaurant->id]) }}">
      <img src="{{ ImageHelper::getFirstImageForRestaurant($restaurant) }}" class="c-res-index-card--img__sizing">
    </a>
  </div>

  <div class="col-md-5 mt-2 mb-2">
    <div class="c-res-index-card__ttl--wrap">
        <h2 class="c-res-index-card__ttl">
          <a href="{{ route('restaurants.show', [$restaurant->id]) }}" class="c-res-index-card__ttl--link">{{ $restaurant->name }}</a>
        </h2>
    </div>

    <div style="">
      @include('components.user.restaurants.info', ['restaurant' => $restaurant])
    </div>

    <div class="c-res-index-card--desc">
      <h3 class="c-res-index-card--desc-ttl">
        {{ $restaurant->description_title }}
      </h3>
      @if(!empty($restaurant->description))
        <p class="c-res-index-card--desc-p">
          {{ $restaurant->description }}
        </p>
      @endif
    </div>

    <div class="text-center" style="margin-top: 16px;">
      <a href="{{ route('restaurants.show', [$restaurant->id]) }}" class="w-100 m-btnM" btn-type="primary">
        詳しく見る
      </a>
    </div>
  </div>

</div>
