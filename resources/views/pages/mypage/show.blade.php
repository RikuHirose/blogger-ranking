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
          <div class="w-100">
            <div class="c-ranking-box card-body">
              <span class="period">
                {{ date('Y年m月d日', strtotime('first day of previous month')) }} ~ {{ date('Y年m月d日', strtotime('last day of previous month')) }}
              </span>
              <p class="rank">
                {{ $rank }}位 / {{ $count }}位
              </p>
            </div>
          </div>
        @endif

        <table class="table table-borderless">
          <tbody>
            <tr>
              <th scope="row">プロフィール写真</th>
              <td>
                <img src="{{ $currentUser->image->url }}" style="width: 32px; height: 32px;">
              </td>
            </tr>
            <tr>
              <th scope="row">お名前</th>
              <td>{{ $currentUser->name }}</td>
            </tr>
            <tr>
              <th scope="row">メールアドレス</th>
              <td>{{ $currentUser->email }}</td>
            </tr>
            <tr>
              <th scope="row">
                {{ date('Y年m月', strtotime('first day of previous month')) }}
                の売り上げ
              </th>
              <td>{{ $currentUser->last_mounth_sales }} 円</td>
            </tr>
            <tr>
              <th scope="row">
                {{ date('Y年m月', strtotime('first day of previous month')) }}
                のPV
              </th>
              <td>{{ $currentUser->last_mounth_pv }} pv</td>
            </tr>
            <tr>
              <th scope="row">ブログ</th>
              <td>
                <a href="{{ $currentUser->blog_url }}">{{ $currentUser->blog_url }}</a>
              </td>
            </tr>
            <tr>
              <th scope="row">
                <i class="fa-twitter"></i>
                Twitter
              </th>
              <td>
                <a href="{{ $currentUser->tw_url }}">{{ $currentUser->tw_url }}</a>
              </td>
            </tr>
          </tbody>
        </table>
        <a href="{{ route('mypage.edit') }}" class="m-btn" btn-type="primary">
          修正する
        </a>
      </div>
    </div>
  </div>

@endsection
