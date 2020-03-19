<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginVK() {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $userRepository) {
        if (Auth::id()) {
            return redirect()->route('home');
        }
        $user = Socialite::driver('vkontakte')->user();

        session(['soc.token' => $user->token]);

        $userInSystem = $userRepository->getUserBySocId($user, 'vk');

      //  $userInSystem = User::query()->find(1);
       // dd($userInSystem);
        Auth::login($userInSystem);
        return redirect()->route('home');
    }
    public function loginGH() {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::with('github')->redirect();
    }

    public function responseGH(UserRepository $userRepository) {
        if (Auth::id()) {
            return redirect()->route('home');
        }
        $user = Socialite::driver('github')->user();

        session(['soc.token' => $user->token]);

        $userInSystem = $userRepository->getUserBySocId($user, 'gh');

        //  $userInSystem = User::query()->find(1);
        // dd($userInSystem);
        Auth::login($userInSystem);
        return redirect()->route('home');
    }
}
