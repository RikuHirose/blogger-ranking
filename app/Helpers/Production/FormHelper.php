<?php
namespace App\Helpers\Production;

use App\Helpers\FormHelperInterface;
use Illuminate\Http\Request;
use App\Repositories\SituationRepositoryInterface;

class FormHelper implements FormHelperInterface
{
    /** @var SituationRepositoryInterface */
    protected $situationRepository;

    public function __construct(
        SituationRepositoryInterface $situationRepository
    ) {
        $this->situationRepository = $situationRepository;
    }

    public function suggestpriceList()
    {
      $price_list = [
        1000,
        2000,
        3000,
        4000,
        5000,
        8000,
        10000,
        15000,
        20000,
        30000,
      ];

      return $price_list;
    }

    public function suggestOpeningHoursList()
    {
      $time_list = [
        '朝営業（5時～10時）',
        'ランチ（10時～14時）',
        'ディナータイム（17時～24時）',
        '深夜営業（23時～29時）',
        '24時間営業'
      ];

      return $time_list;
    }

    public function getSituationList()
    {
        return $this->situationRepository->all();
    }

    public function returnSearchMessage($parameter, $message)
    {
        foreach ($parameter as $key => $value) {
            if (is_null($value)) { continue; }

            $message .= $value.' / ';

            if ($key == "budget_meal_type") {
                if ($value == '0') { $message .= 'ディナー / '; }
                if ($value == '1') { $message .= 'ランチ / '; }
            }

            if ($key == "budget") {
                $message .= '~'.$value.'円 / ';
            }

            if ($key == "nearest_station") {
                $message .= $value.'駅';
            }

        }

        $message .= 'の条件にマッチするお店はありません';

        return $message;
    }

}
