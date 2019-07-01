@extends('layouts.user.app')

@section('content')

  <div class="p-res-index">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('ranking') }}
      </div>
      <div class="col-md-6"></div>

      <div class="col-md-12 mt-3 mb-5">
        <div class="">
          
        </div>
      </div>

    </div>

    <div class="row">
      <!-- content -->
      <div class="col-md-12">
        @isset($message)
          {{ $message }}
        @endisset

        @if(!is_null($top3Users))
          @include('components.user.ranking.top3', ['users' => $top3Users])
        @endif

        @if(!is_null($subordinateUsers))
          @include('components.user.ranking.rankingTable', ['users' => $subordinateUsers])
        @endif
      </div>
    </div>
  </div>

@endsection