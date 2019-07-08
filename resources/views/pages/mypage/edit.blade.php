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
         
          <user-edit-form
          :last-mounth="{{ json_encode(date('Y年m月', strtotime('first day of previous month'))) }}"
          :current-user="{{ json_encode($currentUser) }}"
          :categories="{{ json_encode($categories) }}"
          ></user-edit-form>
      </div>
    </div>
  </div>

@endsection
