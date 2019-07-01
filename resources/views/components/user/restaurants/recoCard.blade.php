<div class="c-res-reco-card">
  <a href="{{ route('restaurants.show', [$restaurant->id]) }}" class="c-res-reco-card--wrap">
    <div class="c-res-reco-card--img__wrap">
      <img src="{{ ImageHelper::getFirstImageForRestaurant($restaurant) }}" class="c-res-reco-card--img__sizing">
    </div>

    <div class="c-res-reco-card__content">
      <p class="c-res-reco-card__ttl">
        <a href="{{ route('restaurants.show', [$restaurant->id]) }}" class="c-res-reco-card__ttl--link">{{ $restaurant->name }}</a>
      </p>
      <div>
        @include('components.user.restaurants.adminEvaluate', ['restaurant' => $restaurant])
        <span class="m-tag">
          {{ $restaurant->category->name }}
        </span>
      </div>
    </div>
  </a>
</div>
