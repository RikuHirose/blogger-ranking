<div class="col-md-3 c-sidebar-users-show">
  <div class="list-group list-group-flush">
    <a
      href="{{ route('mypage.show') }}"
      class="list-group-item list-group-item-action {{ isset($show) ? 'active-item' : '' }}">
      登録情報
    </a>
    <a
      href="{{ route('mypage.edit.password') }}"
      class="list-group-item list-group-item-action {{ isset($editPassword) ? 'active-item' : '' }}">
      パスワード変更
    </a>

    <a
      href="{{ route('mypage.favorited') }}"
      class="list-group-item list-group-item-action {{ isset($favorited) ? 'active-item' : '' }}">
      お気に入り
    </a>
  </div>
</div>

