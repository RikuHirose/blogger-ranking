<?php
namespace App\Helpers\Production;

use App\Helpers\UserHelperInterface;
use Illuminate\Http\Request;

class UserHelper implements UserHelperInterface
{
    public function __construct(
    ) {
        $currentUser = \Auth::user();

        if (is_null($currentUser)) {
            $this->user = $currentUser;
        } else {
            $this->user = $currentUser->load('image');
        }

        $this->birthday = explode('-', $this->user->birthday);
    }

    public function getBirthYear()
    {
        if (!isset($this->birthday)) {
            return $this->birthday[0];
        }
    }
    public function getBirthMonth()
    {
        if (!isset($this->birthday)) {
            return $this->birthday[1];
        }
    }
    public function getBirthDay()
    {
        if (!isset($this->birthday)) {
            return $this->birthday[2];
        }
    }

}
