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

<div class="mt-2 mb-2">
    <span class="fa-location">
      <span>
        {{ $restaurant->nearest_station }}徒歩{{ $restaurant->nearest_station_minutes }}分
      </span>
    </span>
</div>