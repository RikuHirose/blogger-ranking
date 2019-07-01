<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewCreators as V;

class ViewCreatorServiceProvider extends ServiceProvider
{
    /**
     * 全アプリケーションサービスの初期起動処理
     *
     * @return void
     */
    public function boot()
    {
        View::creator('*', V\ViewSwitchCreator::class);
    }

    /**
     * コンテナ結合の登録
     *
     * @return void
     */
    public function register()
    {
        //
    }
}