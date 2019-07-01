<?php

use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
        [
          'category_id'             => 1,
          'situation_id'            => 2,
          'name'                    => '神南軒',
          'description_title'       => '',
          'description'             => 'クラシック調に仕上げた内装、個室やルーフテラスも備えた上品な店内では、多彩な創作料理とドリンク類が楽しめる。',
          'lunch_price_zone'        => 2000,
          'dinner_price_zone'       => 5000,
          'address'                 => '東京都渋谷区神南1-20-5 VORT　渋谷　Kaleido　９Ｆ',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 5,
          'access'                  => 'JR渋谷駅ハチ公口より徒歩5分 渋谷駅から403m',
          'opening_hours'           => '平日・土：11:30～15:00/17:00～23:00 日祝：11:30～15:00/17:00～22:00　※日祝の前日の場合は23時まで。日曜営業',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '132席',
          'hp_url'                  => 'http://www.jinnanken.com/',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '03-5784-4455',
          'admin_evaluate'          => 5
        ],
        [
          'category_id'             => 2,
          'situation_id'            => 2,
          'name'                    => '汁べゑ 渋谷店',
          'description_title'       => '',
          'description'             => '遊び心のあるユニークな造りの建物で、洒落っ気のあるわいわいした明るく親しみやすい空間で、炙りしめ鯖や角煮など家庭的な和食が頂ける。',
          'lunch_price_zone'        => null,
          'dinner_price_zone'       => 5000,
          'address'                 => '東京都渋谷区神南1-11-5 ダイネス壱番館　渋谷別館　２Ｆ',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 7,
          'access'                  => 'ＪＲ渋谷駅ハチ公口から 徒歩7分 渋谷駅から481m',
          'opening_hours'           => '17:30～23:30(L.O.22:00) 日曜営業',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '82席',
          'hp_url'                  => '',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '03-3463-1010',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 3,
          'situation_id'            => 1,
          'name'                    => 'CONROW 渋谷道玄坂 （コンロウ）',
          'description_title'       => '',
          'description'             => '',
          'lunch_price_zone'        => 1000,
          'dinner_price_zone'       => 3000,
          'address'                 => '東京都渋谷区円山町5-20 道玄坂サンクスビル B1F',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 6,
          'access'                  => '渋谷駅より徒歩6分 京王井の頭線、神泉駅より徒歩２分 神泉駅から199m',
          'opening_hours'           => '【月曜日～土曜日】
          ランチ11:30～15:00(L.O14:30)
          ディナー17:30～24:30(L.O23:30)
          【日曜日】
          ランチ12:00～15:00(L.O14:30)
          ディナー17:00～23:30(L.O22:30)',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '25席',
          'hp_url'                  => '',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '050-5869-4037',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 4,
          'situation_id'            => 2,
          'name'                    => 'ウダガワ 成ル',
          'description_title'       => '',
          'description'             => '日替わりの「だし巻き玉子」などの鉄板焼きの他、和食をベースにしたさまざまな一品料理を出す。全国各地から仕入れる地酒の種類も豊富',
          'lunch_price_zone'        => null,
          'dinner_price_zone'       => 5000,
          'address'                 => '東京都渋谷区宇田川町6-20 パラシオン渋谷 1F',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 5,
          'access'                  => 'ＪＲ 渋谷駅 徒歩5分 東急東横線 渋谷駅 徒歩5分 京王井の頭線 渋谷駅 徒歩5分 渋谷駅から640m',
          'opening_hours'           => '17:30～24:00',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '52席',
          'hp_url'                  => '',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '050-5593-4662',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 5,
          'situation_id'            => 3,
          'name'                    => 'CAFE Legato （レガート）',
          'description_title'       => '',
          'description'             => '「劇場」がコンセプトの広い空間で、夜景を眺めながらジャンルを超えた拘りの料理を楽しめる。豊富なワインを提供。ソファ席や個室も用意。',
          'lunch_price_zone'        => 2000,
          'dinner_price_zone'       => 4000,
          'address'                 => '東京都渋谷区円山町3-6 Ｅ・スペースタワー　１５Ｆ',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 10,
          'access'                  => 'JR各線・京王井の頭線・東急東横線・東京メトロ
渋谷駅より徒歩10分
京王井の頭線 神泉駅より徒歩3分

神泉駅から172m',
          'opening_hours'           => '11:30～26:00（ラストオーダー Food22：30／Drink 25:30）
金・土・祝前 11:30～26:00（ラストオーダー Food23：30／Drink 25:30）
',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '220席',
          'hp_url'                  => 'https://cafelegato.com/',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '050-5570-0355',
          'admin_evaluate'          => 5
        ],
        [
          'category_id'             => 6,
          'situation_id'            => 1,
          'name'                    => 'ブルゴンディセ ヘイメル （Bourgondische HEMEL）',
          'description_title'       => '',
          'description'             => '「食事を楽しむ人たちの天国」をコンセプトとしたウッディな内装のビアバー。種類豊富なベルギービールと共にビストロ料理を堪能できる。',
          'lunch_price_zone'        => null,
          'dinner_price_zone'       => 4000,
          'address'                 => '東京都渋谷区道玄坂2-16-8 ビジネスヴィップ渋谷道玄坂 坂本ビル B1F',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 10,
          'access'                  => '渋谷駅　ハチ公口から徒歩約10分
半蔵門線　渋谷駅出口から徒歩約3分
京王井の頭線　神泉駅から徒歩約5分

神泉駅から278m',
          'opening_hours'           => '17:00～翌3:00(L.O.翌2:30) 日曜営業',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '43席',
          'hp_url'                  => '',
          'fb_url'                  => 'https://www.facebook.com/hemelshibuya/',
          'ig_url'                  => 'https://www.instagram.com/hemel_dougenzaka/',
          'tw_url'                  => '',
          'tel'                     => '03-5918-6939',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 6,
          'situation_id'            => 1,
          'name'                    => 'ベルゴ （BELGO）',
          'description_title'       => '',
          'description'             => '',
          'lunch_price_zone'        => null,
          'dinner_price_zone'       => 2000,
          'address'                 => '東京都渋谷区渋谷3-18-7 渋谷第一号ビル　Ｂ１Ｆ',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 3,
          'access'                  => 'ＪＲ渋谷駅東口、新南口から 徒歩3分 渋谷駅から241m',
          'opening_hours'           => '月～土 17:30～翌02:00(L.O.01:30) 祝日 16:00～24:00(L.O.23:30)',
          'regular_holiday'         => '日曜日・年末年始',
          'seating_capacity'        => '35席',
          'hp_url'                  => 'http://www.eurobeer.net/belgo/',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => 'https://twitter.com/shibuya_belgo',
          'tel'                     => '03-3409-4442',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 6,
          'situation_id'            => 1,
          'name'                    => 'グッドビアファウセッツ　 （good beerFaucets）',
          'description_title'       => '',
          'description'             => '多数のビールタップを備えた店内で、日本とアメリカのクラフトビールを提供。自家製ソーセージやアヒージョなど、フードメニューは多彩。',
          'lunch_price_zone'        => 2000,
          'dinner_price_zone'       => 4000,
          'address'                 => '東京都渋谷区松濤1-29-1 クロスロードビル 2F',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 5,
          'access'                  => '京王井の頭線　神泉駅　徒歩５分
京王井の頭線、東急田園都市線、東京メトロ半蔵門線　渋谷駅　徒歩５分
ＪＲ山手線、東京メトロ銀座線・副都心線、東急東横線　渋谷駅　徒歩７分

神泉駅から348m',
          'opening_hours'           => '[月～木]16:00～0:00（L.O.23:00）
[金]16:00～1:00
[土・祝]15:00～0:00
[日]15:00～23:00
※月曜が祝日の場合は日曜が~24時、月曜が〜23時までになります。

日曜営業',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '64席',
          'hp_url'                  => 'http://goodbeerfaucets.jp/',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '03-3770-5544',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 2,
          'situation_id'            => 2,
          'name'                    => '権八 渋谷 （GONPACHI）',
          'description_title'       => '',
          'description'             => '和のモチーフを活かしたモダンな空間で、寿司と一品料理を単品とコースで提供。ランチは寿司の盛り合わせや会席コースを用意する。',
          'lunch_price_zone'        => 2000,
          'dinner_price_zone'       => 5000,
          'address'                 => '東京都渋谷区円山町3-6 Ｅ・スペースタワー　１４Ｆ',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 8,
          'access'                  => 'JR渋谷駅より徒歩８分
京王井の頭線渋谷駅より徒歩５分
京王井の頭線神泉駅より徒歩３分

神泉駅から207m',
          'opening_hours'           => 'ランチ
11:30～15:00
ディナー
15:00～03:30(L.O.03:00)
',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '220席',
          'hp_url'                  => 'https://gonpachi.jp/shibuya/',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '050-5571-2182',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 2,
          'situation_id'            => 2,
          'name'                    => '開花屋 （かいかや）',
          'description_title'       => '',
          'description'             => '市場の新鮮で旬の海鮮類を使った和食を始めとした創作料理のメニューが頂ける。明るく家庭的なレストランはカジュアルで居心地が良い。',
          'lunch_price_zone'        => 1000,
          'dinner_price_zone'       => 5000,
          'address'                 => '東京都渋谷区円山町23-7 星野円山ビル 1F',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 8,
          'access'                  => '京王井の頭線【神泉駅】徒歩２分
東京メトロ半蔵門線、東急田園都市線【渋谷駅】徒歩８分
ＪＲ山手線【渋谷駅】徒歩10分
東京メトロ銀座線【渋谷駅】徒歩11分

神泉駅から79m',
          'opening_hours'           => '17:00 ～23:30(L.O.22:30) 日曜営業',
          'regular_holiday'         => 'ほぼ無休',
          'seating_capacity'        => '76席',
          'hp_url'                  => 'http://www.kaikaya.com/index.html',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '03-3770-0878',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 7,
          'situation_id'            => 1,
          'name'                    => '金剛園',
          'description_title'       => '',
          'description'             => 'シンプルな内装の店内。肉はどれもボリュームがあり、角切りタン塩やユッケも好評。ドリンクも充実し。',
          'lunch_price_zone'        => null,
          'dinner_price_zone'       => 8000,
          'address'                 => '東京都渋谷区道玄坂2-25-7 プラザ道玄坂　２F',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 7,
          'access'                  => '渋谷駅ハチ公口徒歩7分
１、スクランブル交差点を道玄坂方面に進む。
２、フレッシュネスバーガー横（東急本店近く）

神泉駅から441m',
          'opening_hours'           => '17:00～翌4:00[LO 3:00] 日曜営業',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '24席',
          'hp_url'                  => '',
          'ig_url'                  => '',
          'fb_url'                  => 'https://www.facebook.com/Japanease.Beef.A5/',
          'tw_url'                  => 'https://twitter.com/@JPBFA5ofKONGOEN',
          'tel'                     => '050-5869-3974',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 2,
          'situation_id'            => 3,
          'name'                    => '食幹 渋谷 （shokkan shibuya）',
          'description_title'       => '',
          'description'             => 'オープンキッチンを囲むカウンター席が中心の、地階1階にある創作和食の店。和モダンな落ち着く空間。種類豊富な日本酒を取り揃えている。',
          'lunch_price_zone'        => null,
          'dinner_price_zone'       => 15000,
          'address'                 => '東京都渋谷区渋谷3-5-5 ＨＡＫＫＡビル　Ｂ１Ｆ',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 5,
          'access'                  => '渋谷駅より徒歩5分 六本木通り沿い 渋谷駅から500m',
          'opening_hours'           => '「月～金」
18:00～24：00 (L.O 23:00)
「土日祝」
17:00～24：00 (L.O 23:00)
　コースはL.O 22:30
日曜営業',
          'regular_holiday'         => '年末年始',
          'seating_capacity'        => '60席',
          'hp_url'                  => 'https://shokkan.com/shibuya/',
          'fb_url'                  => 'https://www.facebook.com/shokkanshibuya/',
          'ig_url'                  => 'https://www.instagram.com/team_shokkan/',
          'tw_url'                  => '',
          'tel'                     => '03-3797-1911',
          'admin_evaluate'          => 5
        ],
        [
          'category_id'             => 8,
          'situation_id'            => 1,
          'name'                    => 'ザリガニカフェ （Zarigani Cafe）',
          'description_title'       => '',
          'description'             => 'ソフトドリンクとスイーツの他、ご飯物と惣菜などのプレート、サンドイッチ、つまみなどのフードも提供。アルコール類も置いている。',
          'lunch_price_zone'        => 2000,
          'dinner_price_zone'       => 3000,
          'address'                 => '東京都渋谷区宇田川町6-11 １ＦＣ号室',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 10,
          'access'                  => '渋谷駅から徒歩10分 渋谷駅から751m',
          'opening_hours'           => '［月〜土］
12:00〜23:30（L.O 22:30）
ランチタイム12:00〜17:00 （月〜金）

［日］
12:00〜23:00 （L.O 22:00）',
          'regular_holiday'         => '不定休',
          'seating_capacity'        => '49席',
          'hp_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'fb_url'                  => 'https://www.facebook.com/zariganicafe',
          'tel'                     => '03-5459-0655',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 8,
          'situation_id'            => 1,
          'name'                    => 'and people jinnan （アンド ピープル）',
          'description_title'       => '',
          'description'             => 'ニューヨークの廃墟をイメージしたアンティーク調の店内で、イタリアンをベースにした料理をカジュアルに提供。貸切パーティにも対応する。',
          'lunch_price_zone'        => 2000,
          'dinner_price_zone'       => 3000,
          'address'                 => '東京都渋谷区神南1-20-5 NAVI SHIBUYA',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 7,
          'access'                  => '渋谷駅より徒歩７分 渋谷駅から398m',
          'opening_hours'           => '12：00～23：30（L.O.22:30、ドリンクL.O.23:00）',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '90席',
          'hp_url'                  => '',
          'fb_url'                  => '',
          'tw_url'                  => '',
          'ig_url'                  => 'https://www.instagram.com/andpeople.insta/',
          'tel'                     => '050-5571-5481',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 5,
          'situation_id'            => 4,
          'name'                    => 'エマ ラウンジ （emma lounge）',
          'description_title'       => '',
          'description'             => '革張りのソファや観葉植物が置かれた店内は、洗練された落ち着きのある雰囲気。自家製サングリアやレアチーズケーキなどを提供している。',
          'lunch_price_zone'        => 1000,
          'dinner_price_zone'       => 4000,
          'address'                 => '東京都渋谷区道玄坂1-14-9 ソシアル道玄坂 2F',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 5,
          'access'                  => 'JR山手線/埼京線「渋谷駅」
マークシティ南側の道を道玄坂方面へ、坂を上り始めて２つめのT字路を左に曲がったすぐのところ。　徒歩5分

東京メトロ銀座線、京王井の頭線「渋谷駅」
マークシティ内のコンビニ「サンクス」脇の出入り口から外へ
右手のT字路を入ったところ。

渋谷駅から329m',
          'opening_hours'           => '[月～木]
11:30～24:00
[金・祝前]
11:30～翌2:00
[土]
15:00〜翌2:00
[日・祝]
15:00〜23:00',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '100席',
          'hp_url'                  => 'http://renovationplanning.co.jp/portfolio_page/emma-lounge',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '050-5590-1379',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 5,
          'situation_id'            => 4,
          'name'                    => 'トウキョウ サロナード カフェ ダブ （tokyo salonard cafe : dub）',
          'description_title'       => '',
          'description'             => 'マークシティの路地裏にある、ゆったりできるアンティー調のソファーがあるカフェ。喫茶だけでなく、アルコールメニューもあり。',
          'lunch_price_zone'        => 1000,
          'dinner_price_zone'       => 3000,
          'address'                 => '東京都渋谷区道玄坂1-11-3 富士商事ビル　２Ｆ',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 2,
          'access'                  => '渋谷駅から256m',
          'opening_hours'           => '[全日]12:00～24:00
L.O 23:00
※年末年始除く',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '70席',
          'hp_url'                  => 'http://www.renovationplanning.co.jp/',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '050-5872-2124',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 1,
          'situation_id'            => 4,
          'name'                    => 'KICHIRI　渋谷 （きちり）',
          'description_title'       => '',
          'description'             => '和モダンで上品な店内には、大小さまざまな個室を完備。博多地鶏を使用した料理やアヒージョなど、多彩なメニューを取り揃えている。',
          'lunch_price_zone'        => null,
          'dinner_price_zone'       => 5000,
          'address'                 => '東京都渋谷区宇田川町23-5 ハイマンテン渋谷ビル',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 2,
          'access'                  => 'ＪＲ 渋谷駅 徒歩2分 東急東横線 渋谷駅 徒歩2分 渋谷駅から263m',
          'opening_hours'           => '[日～木] 17:00～翌2:00
[金・土] 17:00～翌5:00
12月31日　24時閉店
１月１日　24時閉店
１月2日　翌2:00閉店
１月3日　翌2:00閉店',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '150席',
          'hp_url'                  => 'http://www.kichiri.co.jp/',
          'fb_url'                  => '',
          'ig_url'                  => '',
          'tw_url'                  => '',
          'tel'                     => '050-5868-2505',
          'admin_evaluate'          => 4
        ],
        [
          'category_id'             => 1,
          'situation_id'            => 4,
          'name'                    => 'イグアンドピース （igu&peace）',
          'description_title'       => '',
          'description'             => '',
          'lunch_price_zone'        => null,
          'dinner_price_zone'       => 5000,
          'address'                 => '東京都渋谷区道玄坂1-5-2 渋谷SEDEビル 4F',
          'nearest_station'         => '渋谷駅',
          'nearest_station_minutes' => 2,
          'access'                  => 'ＪＲ 渋谷駅 ハチ公口 徒歩2分 京王井の頭線 渋谷駅 西口 徒歩2分 渋谷駅から179m',
          'opening_hours'           => '【月〜土】
18:00〜27:00（LO26:00）
【日祝】
17:00〜24:00（LO23:00）',
          'regular_holiday'         => '無休',
          'seating_capacity'        => '97席',
          'hp_url'                  => 'http://iguandpeace.com/',
          'fb_url'                  => 'https://www.facebook.com/iguandpeace/',
          'ig_url'                  => 'https://www.instagram.com/igupeacepatron/?utm_source=ig_profile_share&igshid=jbfnxdtebzo4',
          'tw_url'                  => '',
          'tel'                     => '050-5890-4341',
          'admin_evaluate'          => 4
        ],
      ]);
    }
}
