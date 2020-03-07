<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;

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
                //return redirect()->route('admin.updateProfile')->with('success', 'Пароль успешно изменен!');
                $request->session()->flash('success', 'Данные пользователя успешно изменены');
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
            }
            return redirect()->route('admin.updateProfile')->withErrors($errors);
        }

        return view('admin.profile', [
            'user' => $user
        ]);
    }
    public function change(Request $request){

        $users = Users::query()->get();
        //dd($users);
        if ($request->isMethod('post')) {
            //dd($request);
            $users = Users::query();
            $users->save(['is_admin' => $request->post('is_admin')]);

        }
        return view('admin.change', ['users' => $users]);

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
