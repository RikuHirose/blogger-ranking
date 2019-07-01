@extends('layouts.user.app')

@section('content')

  <div class="p-user-edit-password">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('mypage.edit.password', $currentUser) }}
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- content -->
      <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('mypage.update.password') }}" method="POST">
          @csrf
          <div class="m-frmTextbox">
            <label>新しいパスワード</label>
            <input type="password" class="form-control" name="password" value="" required>
          </div>
          <div class="m-frmTextbox">
            <label>もう一度入力</label>
            <input type="password" class="form-control" name="password_confirmation" value="" required>
          </div>


          <button type="submit" class="m-btn" btn-type="primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

@endsection
