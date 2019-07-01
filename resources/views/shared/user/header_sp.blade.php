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

                                        <a href="{{ route('ranking.index') }}" class="">
                                            <i ranking="1" class="fa-crown"></i>
                                            <span>ランキングを見る</span>
                                        </a>

                                        <!-- <a href="{{ route('mypage.favorited') }}" class="">
                                            <i class="fa-heart-red"></i>
                                            <span>お気に入り</span>
                                        </a> -->
                                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa-signout"></i>
                                            <span>ログアウト</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
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
