<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request) {
        $user = Auth::user();

        $errors = [];
        if ($request->isMethod('post')) {
           $this->validate($request, $this->ValidateRules(), [], $this->attributeNames());
           if (Hash::check($request->post('password'), $user->password)) {
               $user->fill([
                   'name' => $request->post('name'),
                   'password' => Hash::make($request->post('newPassword')),
                   'email' => $request->post('email')
               ]);
               $user->save();

               $request->session()->flash('success', 'Данные пользователя успешно изменены');
            } else {
               $errors['password'][] = 'Неверно введен текущий пароль';
            }
           return redirect()->route('updateProfile')->withErrors($errors);
        }

        return view('profile', [
            'user' => $user
        ]);
    }

    protected function ValidateRules() {
        return [
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3'
        ];
    }

    protected function attributeNames() {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }

}
