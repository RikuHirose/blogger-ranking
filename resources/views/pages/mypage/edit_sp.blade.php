@extends('layouts.user.app')

@section('content')

  <div class="p-mypage-edit">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('mypage.edit', $currentUser) }}
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- content -->
      <div class="col-md-12">
         <!-- error message -->
          @if($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form action="{{ route('mypage.update') }}" method="POST">
            @csrf
            <div class="m-frmTextbox">
              <label>お名前</label>
              <input type="text" class="form-control" name="name" value="{{ $currentUser->name }}" required>
            </div>
            <div class="m-frmTextbox">
              <label>メールアドレス</label>
              <input type="email" class="form-control" name="email" value="{{ $currentUser->email }}" required>
            </div>

            <div class="m-frmTextbox">
              <label>{{ date('Y年m月', strtotime('first day of previous month')) }}の売り上げ</label>
              <input type="number" class="form-control" name="last_mounth_sales" value="{{ $currentUser->last_mounth_sales }}" required>
            </div>

            <div class="m-frmTextbox">
              <label>{{ date('Y年m月', strtotime('first day of previous month')) }}のPV</label>
              <input type="number" class="form-control" name="last_mounth_pv" value="{{ $currentUser->last_mounth_pv }}" required>
            </div>

            <div class="m-frmTextbox">
              <label>ブログ</label>
              <input type="text" class="form-control" name="blog_url" value="{{ $currentUser->blog_url }}" required>
            </div>

            <div class="m-frmTextbox">
              <label>Twitter</label>
              <input type="text" class="form-control" name="tw_url" value="{{ $currentUser->tw_url }}" required>
            </div>

            <div class="text-center">
              <button type="submit" class="m-btn" btn-type="primary">
                修正する
              </button>
            </div>
          </form>
      </div>
    </div>
  </div>

@endsection