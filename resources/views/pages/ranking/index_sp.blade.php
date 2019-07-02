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
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
        <script type="application/javascript" async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

        @if(!is_null($top3Users) || !is_null($subordinateUsers))
          @include('components.user.ranking.rankingTableSp', ['users' => $subordinateUsers, 'top3Users' => $top3Users])
        @endif
      </div>
    </div>
  </div>

@endsection