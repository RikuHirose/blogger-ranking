@extends('layouts.user.app')

@section('content')

  <div class="p-user-show">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('mypage.show', $currentUser) }}
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- content -->
      <div class="col-md-12">
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
              <th scope="row">先月の売り上げ</th>
              <td>{{ $currentUser->last_mounth_sales }} 円</td>
            </tr>
            <tr>
              <th scope="row">先月のPV</th>
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
        <div class="text-center">
          <a href="{{ route('mypage.edit') }}"  class="m-btn" btn-type="primary">
            修正する
          </a>
        </div>
      </div>
    </div>
  </div>

@endsection
