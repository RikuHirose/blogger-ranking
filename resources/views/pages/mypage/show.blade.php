@extends('layouts.user.app')

@section('content')

  <div class="p-mypge-show">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('mypage.show', $currentUser) }}
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- sidebar -->
      @include('components.user.sidebar.users.show', ['show' => true])
      <!-- content -->
      <div class="col-md-9">

        @if(isset($rank))
          <div class="w-100 c-ranking-box">
            <div class="c-ranking-box__box">
              <span class="period">
                {{ date('Y年m月d日', strtotime('first day of previous month')) }} ~ {{ date('Y年m月d日', strtotime('last day of previous month')) }}
              </span>
              <p class="rank">
                {{ $rank }}位 / {{ $count }}
              </p>
            </div>
            <a href="{{ UrlHelper::getTwitterShareUrl($currentUser, $rank, $count) }}" class="twitter-share-button" data-show-count="false">Tweet</a>
            <script type="application/javascript" async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
        @endif

        @include('components.user.mypage.table', ['user' => $currentUser])

        <a href="{{ route('mypage.edit') }}" class="m-btn" btn-type="primary">
          修正する
        </a>
      </div>
    </div>
  </div>

@endsection
