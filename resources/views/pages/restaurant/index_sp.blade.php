@extends('layouts.user.app')

@section('content')

  <div class="p-res-index-sp">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('restaurants') }}
      </div>
      <div class="col-md-6"></div>

      <div class="col-md-12 mt-3 mb-5">
        <div class="mx-auto">
          <search-restaurants-sp
            :price-list="{{ json_encode(FormHelper::suggestpriceList()) }}"
            :situation-list="{{ json_encode(FormHelper::getSituationList()) }}"
            :parameter="{{ json_encode($parameter) }}"
            :search-button-title="'再検索する'" />
        </div>
      </div>

      <div class="col-md-6"></div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- sidebar -->
      @include('components.user.sidebar.restaurants.index')
      <!-- content -->
      <div class="col-md-10">
        @isset($message)
          {{ $message }}
        @endisset

        @each('components.user.restaurants.indexCard_sp', $restaurants, 'restaurant')
      </div>
    </div>
  </div>
@endsection
