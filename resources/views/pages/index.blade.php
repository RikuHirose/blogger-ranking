@extends('layouts.user.app', ['noContainer' => true])

@section('content')
  <div id="p-index" class="p-index">
    <!-- p-index--image -->
    <div class="p-index__image">
      <p class="p-index--copy">ブロガーのがんばりが認められるプラットフォーム</p>
      <div class="p-index__search-form text-center">
        <a href="{{ route('ranking.index') }}" class="">
          <button class="m-btn" style="width: 280px; height: 60px;">いますぐランキングを見る</button>
        </a>
      </div>
    </div>
    <!-- p-index--point -->
    <section class="p-index__point bg-light">
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-12">
                <div class="text-center">
                    <h2 class="">
                        {{ Config::get('app.name') }}とは
                    </h2>
                </div>
                <p class="text-center h2-desc">あなたのブロガーとしてのがんばりが認められるサービスです</p>
                <div class="row mb-3 mt-3">
                    <div class="col-md-4 col-sm-6 col-12">
                      <span class="fa-4x fa-style">
                        <i class="fas fa-circle fa-stack-2x fa-primary"></i>
                        <i class="fa-crown fa-white"></i>
                      </span>
                      <div class="">
                          <div class="card-ttl">
                              ①あなたのランクがはっきり分かる
                          </div>
                          <p class="w-75 mx-auto">
                            駆け出しブロガーは今まで孤独でした。{{ Config::get('app.name') }}ではあなたのブロガーとしてのランクがはっきり分かります。
                          </p>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                      <span class="fa-4x fa-style">
                        <i class="fas fa-circle fa-stack-2x fa-primary"></i>
                        <i class="fa-lightbulb fa-white"></i>
                      </span>
                      <div class="">
                          <div class="card-ttl">
                              ②ライバルブロガーのランクがわかる
                          </div>
                          <p class="w-75 mx-auto">
                            順位の可視化することで、ライバルのブロガーと競争できます。
                          </p>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                      <span class="fa-4x fa-style">
                        <i class="fas fa-circle fa-stack-2x fa-primary"></i>
                        <i class="fa-thumbs-up fa-white"></i>
                      </span>
                      <div class="">
                          <div class="card-ttl">
                            ③あなたのがんばりがランキングに直結します
                          </div>
                          <p class="">
                            頑張ってブロガーランクを上げよう!!
                          </p>
                      </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </section>

    <!-- p-index--top3-blogger -->
    @if(!is_null($top3Users))
      <section class="p-index__top3-blogger">
        <div class="container">
          <div class="row">
              <div class="col-md-12 col-12">
                <div class="text-center">
                    <h2 class="">
                        トップのブロガー
                    </h2>
                </div>
                <p class="text-center h2-desc"></p>
              </div>
          </div>
          <!-- content -->
          <div class="col-md-12 mt-3">
            @include('components.user.ranking.top3', ['users' => $top3Users])
          </div>
        </div>
      </section>
    @endif
     <!-- p-index--message -->
    <section class="p-index__message">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 col-12">
                      <div class="text-center p-index__message--wrap">
                        <p class="">ブロガー仲間と切磋琢磨しよう</p>
                        @auth
                          <a href="{{ route('ranking.index') }}" class="">
                            <button class="m-btn">いますぐランキングを見る</button>
                          </a>
                        @endauth

                        @guest
                        <login-button
                        :redirect-url="{{ json_encode(url()->full()) }}"></login-button>
                        @endguest
                      </div>
                  </div>
              </div>
          </div>
    </section>
  </div>
@endsection