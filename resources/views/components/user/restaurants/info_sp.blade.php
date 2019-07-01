<div class="row">
  <div class="col-md-6">
    @include('components.user.restaurants.adminEvaluate', ['restaurant' => $restaurant])
    <span class="m-tag">
      {{ $restaurant->category->name }}
    </span>
    <span class="m-tag m-tag__situation">
      {{ $restaurant->situation->name }}
    </span>
  </div>
  <div class="col-md-6">
  </div>
</div>

<span class="fa-location">
  <span>
    {{ $restaurant->nearest_station }}徒歩{{ $restaurant->nearest_station_minutes }}分
  </span>
</span>
