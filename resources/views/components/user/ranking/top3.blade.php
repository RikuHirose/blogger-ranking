<div class="row mb-3 mt-3 c-ranking-top3">
    <div class="col-md-4 col-sm-6 col-12 user-box">
      <img class="rounded-circle" src="{{ $users[1]->image->url }}" alt="" width="150px" height="150px">
      <span class="fa-crown" ranking="2"></span>

      <div class="user-box__info">
        <p class="user-box__info__name">{{ $users[1]->name }}</p>
        <p class="user-box__info__desc">
          {{ $users[1]->last_mounth_sales }} 円
          /
          {{ $users[1]->last_mounth_pv }} pv
        </p>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12 user-box">
      <img class="rounded-circle" src="{{ $users[0]->image->url }}" alt="" width="200px" height="200px">
      <span class="fa-crown" ranking="1"></span>

      <div class="user-box__info">
        <p class="user-box__info__name">{{ $users[0]->name }}</p>
        <p class="user-box__info__desc">
          {{ $users[0]->last_mounth_sales }} 円
          /
          {{ $users[0]->last_mounth_pv }} pv
        </p>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12 user-box">
      <img class="rounded-circle" src="{{ $users[2]->image->url }}" alt="" width="150px" height="150px">
      <span class="fa-crown" ranking="3"></span>

      <div class="user-box__info">
        <p class="user-box__info__name">{{ $users[2]->name }}</p>
        <p class="user-box__info__desc">
          {{ $users[2]->last_mounth_sales }} 円
          /
          {{ $users[2]->last_mounth_pv }} pv
        </p>
      </div>
    </div>
</div>