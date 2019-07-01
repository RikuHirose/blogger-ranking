@extends('layouts.user.app')

@section('content')

  <div class="p-user-edit">
    <div class="row mb-2">
      <div class="col-md-6">
        {{ Breadcrumbs::render('mypage.edit', $currentUser) }}
      </div>
      <div class="col-md-6"></div>
    </div>

    <div class="row">
      <!-- sidebar -->
      @include('components.user.sidebar.users.show', ['show' => true])
      <!-- content -->
      <div class="col-md-9">
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
              <label>性別</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="{{ $currentUser->gender }}" @if($currentUser->gender === "male") checked @endif>
                <span class="form-check-label">男性</span>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="{{ $currentUser->gender }}" @if($currentUser->gender === "female") checked @endif>
                <span class="form-check-label">女性</span>
              </div>
            </div>

            <div class="m-frmTextbox">
              <label>生年月日</label>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <select id="birth_year" class="form-control" name="birth_year">
                  <option value="">----</option>
                    @for ($i = 1910; $i <= 2019; $i++)
                      <option value="{{ $i }}"@if(old('birth_year') == $i || UserHelper::getBirthYear() == $i) selected @endif>{{ $i }}</option>
                    @endfor
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <select id="birth_month" class="form-control" name="birth_month">
                    <option value="">--</option>
                    @for ($i = 1; $i <= 12; $i++)
                      <option value="{{ $i }}"@if(old('birth_month') == $i || UserHelper::getBirthMonth() == $i) selected @endif>{{ $i }}</option>
                    @endfor
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <select id="birth_day" class="form-control" name="birth_day">
                    <option value="">--</option>
                    @for ($i = 1; $i <= 31; $i++)
                      <option value="{{ $i }}"@if(old('birth_day') == $i || UserHelper::getBirthDay() == $i) selected @endif>{{ $i }}</option>
                    @endfor
                  </select>
                </div>
              </div>
            </div>


            <button type="submit" class="m-btn" btn-type="primary">Submit</button>
          </form>
      </div>
    </div>
  </div>

@endsection
