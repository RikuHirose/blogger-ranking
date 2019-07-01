<?php

Breadcrumbs::for('index', function ($trail) {
    $trail->push('top', route('index'));
});


// top > レストラン一覧
Breadcrumbs::for('restaurants', function ($trail) {
    $trail->parent('index');
    $trail->push('レストラン一覧', route('restaurants.search'));
});

// top > レストラン一覧 > restaurant->name
Breadcrumbs::for('restaurants.show', function ($trail, $restaurant) {
    $trail->parent('restaurants');
    $trail->push($restaurant->name, route('restaurants.show', $restaurant->id));

});


// top > 登録情報
Breadcrumbs::for('mypage.show', function ($trail, $currentUser) {
    $trail->parent('index');
    $trail->push('登録情報', route('mypage.show'));

});

// top > 登録情報 > 編集
Breadcrumbs::for('mypage.edit', function ($trail, $currentUser) {
    $trail->parent('mypage.show', $currentUser);
    $trail->push('編集', route('mypage.edit'));

});

// top > パスワード編集
Breadcrumbs::for('mypage.edit.password', function ($trail, $currentUser) {
    $trail->parent('index');
    $trail->push('パスワード編集', route('mypage.edit.password'));

});

// top > お気に入り
Breadcrumbs::for('mypage.favorited', function ($trail, $currentUser) {
    $trail->parent('index');
    $trail->push('お気に入り', route('mypage.favorited'));

});