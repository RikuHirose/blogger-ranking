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
      <!-- sidebar -->
      @include('components.user.sidebar.users.show', ['show' => true])
      <!-- content -->
      <div class="col-md-9">
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
              <th scope="row">性別</th>
              <td>{{ $currentUser->gender }}</td>
            </tr>
            <tr>
              <th scope="row">生年月日</th>
              <td>{{ $currentUser->birthday }}</td>
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
