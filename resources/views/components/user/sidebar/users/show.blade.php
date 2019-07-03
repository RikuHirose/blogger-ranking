<div class="col-md-3 c-sidebar-users-show">
  <div class="list-group list-group-flush">
    <a
      href="{{ route('mypage.show') }}"
      class="list-group-item list-group-item-action {{ isset($show) ? 'active-item' : '' }}">
      登録情報
    </a>

    <a
      href=""
      class="list-group-item list-group-item-action {{ isset($favorited) ? 'active-item' : '' }}">
      お気に入り(未実装)
    </a>
  </div>
</div>

