<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Syluxso\PhpPhoneFormat\PhoneFormat;

class UserController extends Controller {

    public function register(Request $request) {
        $args = [];
        return view('accounts.user-register', $args);
    }

    public function register_submit(Request $request) {

        $fields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'pass' => ['required', 'min:3', 'max:100'],
        ]);

        $fields['password'] = bcrypt($fields['pass']);

        $user = User::create($fields);
        auth()->login($user);
        return redirect()->route('account.onboarding_form');
    }

    public function logout() {
        auth()->logout();
        return redirect('/login');
    }

    public function login(Request $request) {
        $this->page->view('accounts.user-login');
        $this->page->title('Login');
        $this->page->page_title('Login');
        return $this->page->output();
    }

    public function login_submit(Request $request) {
        $values = $request->validate([
            'email' => 'required',
            'pass' => 'required',
        ]);

        // $phone = new PhoneFormat($values['phone']);

        if(auth()->attempt([
            'name' => $values['email'],
            'password' => $values['pass'],
            ]))
        {
            $request->session()->regenerate();
        } else {
            Session::flash('alert-danger', 'Email or password is not correct.');
        }
        return redirect('/')->withSuccess('Lets get started!');
    }
}
