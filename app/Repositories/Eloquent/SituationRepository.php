<?php

namespace App\Repositories\Eloquent;
use App\Repositories\SituationRepositoryInterface;
use App\Models\Situation;

class SituationRepository implements SituationRepositoryInterface
{
    protected $situation;

    /**
    * @param object $situation
    */
    public function __construct(Situation $situation)
    {
        $this->situation = $situation;
    }

    public function all()
    {
        return $this->situation->all();
    }

    public function findSituationId($situation_name)
    {
        $situation_id = $this->situation
        // ->where('name', $situation_name)
        ->orWhere('name', 'like', "%{$situation_name}%")
        ->pluck('id')
        ->first();

        return $situation_id;
    }
}