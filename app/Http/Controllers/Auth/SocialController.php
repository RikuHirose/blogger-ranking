<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

use Socialite;
use App\Models\User;
use App\Models\Image;
use App\Models\SocialProvider;
use App\Repositories\SocialProviderRepositoryInterface;

class SocialController extends Controller
{
    /** @var SocialProviderRepositoryInterface */
    protected $socialProviderRepository;

    public function __construct(
        SocialProviderRepositoryInterface $socialProviderRepository
    ) {
        $this->socialProviderRepository = $socialProviderRepository;
    }

    /**
     * Redirect the user to the FaceBook authentication page.
     *
     * @return Response
     */
    public function viewLogin()
    {
        return view('auth.login');
    }

    /**
     * Redirect the user to the FaceBook & Twitter authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from FaceBook.
     *
     * @return Response
     */
    public function handleProviderCallback($providerName)
    {
        try{
            $socialUser = Socialite::driver($providerName)->user();

        } catch(Exception $e){
            return redirect("/");
        }

        //privider_idとemailですでに登録済みかチェック
        $provider = $this->socialProviderRepository->findSocialProvider($socialUser->getId());

        if(!$provider) {

          $user_image = Image::firstOrCreate(
              [
                  'url' => $socialUser->avatar_original
              ]
          );

            $user = User::firstOrCreate(
                [
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'image_id' => $user_image->id,
                ]
            );

            SocialProvider::firstOrCreate(
                [
                    'user_id'     => $user->id,
                    'provider_id' => $socialUser->getId(),
                    'provider'    => $providerName
                ]
            );

        } else {

            $user = User::where(
                ['id' => $provider->user_id]
            )->first();
        }

        auth()->login($user);

        if (strpos(URL::previous(),'facebook') !== false) {
          return redirect('/');

        } else {
          return redirect(URL::previous());
        }
    }

}