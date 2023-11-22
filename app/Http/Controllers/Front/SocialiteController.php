<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $data = [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'avatar' => $googleUser->getAvatar(),
            'google_id' => $googleUser->getId(),
            'nickname' => $googleUser->getNickname(),
        ];

        $user = User::query()->where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create($data);
        }

        Auth::login($user);
        return redirect()->intended()->with('status', 'Ви успішно увійшли!');
    }
}
