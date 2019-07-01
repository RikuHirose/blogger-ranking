@php
  $white_stars = 5 - $restaurant->admin_evaluate;
@endphp

@for ($i = 1; $i <= $restaurant->admin_evaluate; $i++)
  <span class="fa-star-yellow star-icon"></span>
@endfor
@for ($i = 1; $i <= $white_stars; $i++)
  <span class="fa-star-gray star-icon"></span>
@endfor