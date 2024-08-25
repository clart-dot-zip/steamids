<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Models\User;

class SteamAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('steam')->redirect();
    }

    public function callback()
    {
        $steamUser = Socialite::driver('steam')->user();

        // Find or create a user based on the Steam ID
        $user = User::firstOrCreate(
            ['steam_id' => $steamUser->getId()],
            [
                'name' => $steamUser->getNickname(),
                'avatar' => $steamUser->getAvatar(),
                // Add other necessary fields here if needed
            ]
        );

        // Log the user in
        Auth::login($user, true);

        return redirect()->intended('dashboard');
    }
}
