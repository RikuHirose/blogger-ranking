@extends('layouts.user.app', ['noContainer' => true])

@section('content')
  <div id="p-index" class="p-index">
    <!-- p-index--image -->
    <div class="p-index__image">
      <p class="p-index--copy">デートにピッタリなお店を見つけよう</p>
      <div class="p-index__search-form">
        <button class="m-btn">いますぐランキングを見る</button>
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
                <p class="text-center h2-desc">デートにピッタリなお店がすぐ見つかるサービスです</p>
                <div class="row mb-3 mt-3">
                    <div class="col-md-4 col-sm-6 col-12">
                      <span class="fa-4x fa-style">
                        <i class="fas fa-circle fa-stack-2x fa-primary"></i>
                        <i class="fa-eat fa-white"></i>
                      </span>
                      <div class="">
                          <div class="card-ttl">
                              ①デートにピッタリなお店がすぐ見つかる
                          </div>
                          <p class="">
                            今までのグルメサイトはお店が多すぎました。{{ Config::get('app.name') }}ではデートにピッタリなお店のみを掲載しています。
                          </p>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                      <span class="fa-4x fa-style">
                        <i class="fas fa-circle fa-stack-2x fa-primary"></i>
                        <i class="fa-search fa-white"></i>
                      </span>
                      <div class="">
                          <div class="card-ttl">
                              ②専門のスタッフがお店を厳選
                          </div>
                          <p class="">
                            食事や雰囲気、内装、接客など20項目以上の{{ Config::get('app.name') }}独自の選定基準を全て満たしたデートにピッタリなお店だけを掲載しています。
                          </p>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                      <span class="fa-4x fa-style">
                        <i class="fas fa-circle fa-stack-2x fa-primary"></i>
                        <i class="fa-wink fa-white"></i>
                      </span>
                      <div class="">
                          <div class="card-ttl">
                            ③もう迷わない
                          </div>
                          <p class="">
                            シンプルなデザインでサクサクと検索できるので、もうお店選びで迷うことはありません。
                          </p>
                      </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </section>

    <!-- p-index--top3-blogger -->
    <section class="p-index__top3-blogger">
      <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
              <div class="text-center">
                  <h2 class="">
                      {{ Config::get('app.name') }}とは
                  </h2>
              </div>
              <p class="text-center h2-desc">デートにピッタリなお店がすぐ見つかるサービスです</p>
            </div>
        </div>
        <!-- content -->
        <div class="col-md-12">
          @include('components.user.ranking.top3', ['users' => $top3Users])
        </div>
      </div>
    </section>
     <!-- p-index--message -->
    <section class="p-index__message">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 col-12">
                      <div class="text-center p-index__message--wrap">
                        <p class="">デートにピッタリなお店を見つけよう</p>
                        <a href="#p-index" class="" v-smooth-scroll>
                          <button class="m-btn">いますぐお店を見つける</button>
                        </a>
                      </div>
                  </div>
              </div>
          </div>
    </section>
  </div>
@endsection