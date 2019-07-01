<header id="header" class="">
    <!-- <div class="container-fluid"> -->
    <div class="s-header container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row s-header--wrap">
                    <div class="col-md-3">
                        <div class="float-left s-header-logo">
                            <a href="/" class="">
                                <img src="/images/logo.jpg" class="s-header-logo__sizing">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <nav class="float-right s-header-list">
                            @guest
                                <header-right-list
                                :redirect-url="{{ json_encode(url()->full()) }}"></header-right-list>
                            @else

                                <div id="dropdown" class="dropdown s-header-list__dropdown">
                                    <div class="dropdown-toggle" type="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ $currentUser->image->url }}" class="s-header-list__avatar">
                                    </div>
                                    <div class="dropdown-menu s-header-list__dropdown__nav-lists">
                                        <a href="{{ route('mypage.show') }}" class="dropdown-item">マイページ</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
