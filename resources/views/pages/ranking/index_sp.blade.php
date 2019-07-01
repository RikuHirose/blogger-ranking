@extends('layouts.user.app')

@section('content')

  <div class="p-res-index">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('ranking') }}
      </div>
      <div class="col-md-6"></div>

    </div>

    <div class="row">
      <!-- content -->
      <div class="col-md-12">
        @isset($message)
          {{ $message }}
        @endisset

        @include('components.user.ranking.rankingTableSp', ['users' => $subordinateUsers, 'top3Users' => $top3Users])
      </div>
    </div>
  </div>

@endsection