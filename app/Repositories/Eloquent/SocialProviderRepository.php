<?php

namespace App\Repositories\Eloquent;
use App\Repositories\SocialProviderRepositoryInterface;
use App\Models\SocialProvider;

class SocialProviderRepository implements SocialProviderRepositoryInterface
{
    protected $socialProvider;

    /**
    * @param object $socialProvider
    */
    public function __construct(SocialProvider $socialProvider)
    {
        $this->socialProvider = $socialProvider;
    }

    public function findSocialProvider($provider_id)
    {
        return $this->socialProvider->where('provider_id', $provider_id)->first();
    }
}