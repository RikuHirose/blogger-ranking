<header id="header" class="">
    <!-- <div class="container-fluid"> -->
    <div class="s-header container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row s-header--wrap">
                    <div class="col-md-12">
                        <div class="float-left s-header-logo">
                            <a href="/" class="">
                                <img src="/images/logo.jpg" class="s-header-logo__sizing">
                            </a>
                        </div>
                        <nav class="float-right s-header-list">
                            @guest
                                <header-right-list-sp
                                :redirect-url="{{ json_encode(url()->full()) }}"></header-right-list-sp>
                            @else
                                <div class="m-hamburger">
                                    <Slide right>
                                        <a href="{{ route('mypage.show') }}" class="">
                                            <img src="{{ $currentUser->image->url }}" class="s-header-list__avatar">
                                            <span>マイページ</span>
                                        </a>
                                        <a href="{{ route('mypage.edit.password') }}" class="">
                                            <i class="fa-key"></i>
                                            <span>パスワード変更</span>
                                        </a>
                                        <a href="{{ route('mypage.favorited') }}" class="">
                                            <i class="fa-heart-red"></i>
                                            <span>お気に入り</span>
                                        </a>
                                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa-signout"></i>
                                            <span>ログアウト</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <!-- <div class="list-group list-group-flush"> -->
                                            <!-- <a href="{{ route('mypage.show') }}" class="list-group-item list-group-item-action">
                                                マイページ
                                            </a>
                                            <a href="{{ route('mypage.edit.password') }}" class="list-group-item list-group-item-action">
                                                パスワード変更
                                            </a>
                                            <a href="{{ route('mypage.favorited') }}" class="list-group-item list-group-item-action">
                                                お気に入り
                                            </a>
                                            <a class="list-group-item list-group-item-action" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                ログアウト
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form> -->
                                        <!-- </div> -->
                                    </Slide>
                                </div>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
