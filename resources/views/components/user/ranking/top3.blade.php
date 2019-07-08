<div class="row mb-3 mt-3 c-ranking-top3">
    <div class="col-md-4 col-sm-6 col-12 user-box">

      @if(isset($users[1]))
      <a href="{{ route('users.show', $users[1]->id) }}">
        <img class="rounded-circle" src="{{ $users[1]->image->url }}" alt="" width="150px" height="150px">

        <div class="user-box__info">
          <p class="user-box__info__name">
            <i class="fa-crown" ranking="2"></i>
            {{ $users[1]->name }}
          </p>
          <p class="user-box__info__category">
            @include('components.user.category.2categories', ['userCategories' => $users[1]->userCategories])
          </p>
          <p class="user-box__info__desc">
            {{ $users[1]->last_mounth_sales }} 円
            /
            {{ $users[1]->last_mounth_pv }} pv
          </p>
        </div>
      </a>
      @endif
    </div>

    <div class="col-md-4 col-sm-6 col-12 user-box">
      @if(isset($users[0]))
        <a href="{{ route('users.show', $users[0]->id) }}">
          <img class="rounded-circle" src="{{ $users[0]->image->url }}" alt="" width="200px" height="200px">

          <div class="user-box__info">
            <p class="user-box__info__name">
              <i class="fa-crown" ranking="1"></i>
              {{ $users[0]->name }}
            </p>
            <p class="user-box__info__category">
              @include('components.user.category.2categories', ['userCategories' => $users[0]->userCategories])
            </p>
            <p class="user-box__info__desc">
              {{ $users[0]->last_mounth_sales }} 円
              /
              {{ $users[0]->last_mounth_pv }} pv
            </p>
          </div>
        </a>
      @endif
    </div>

    <div class="col-md-4 col-sm-6 col-12 user-box">
      @if(isset($users[2]))
      <a href="{{ route('users.show', $users[2]->id) }}">
        <img class="rounded-circle" src="{{ $users[2]->image->url }}" alt="" width="150px" height="150px">

        <div class="user-box__info">
          <p class="user-box__info__name">
            <i class="fa-crown" ranking="3"></i>
            {{ $users[2]->name }}
          </p>
          <p class="user-box__info__category">
            @include('components.user.category.2categories', ['userCategories' => $users[2]->userCategories])
          </p>
          <p class="user-box__info__desc">
            {{ $users[2]->last_mounth_sales }} 円
            /
            {{ $users[2]->last_mounth_pv }} pv
          </p>
        </div>
      </a>
      @endif
    </div>
</div>