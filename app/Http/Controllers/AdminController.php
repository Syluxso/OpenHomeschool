<?php

namespace App\Http\Controllers;

use App\Http\Helpers\CrudUser;
use App\Models\User;
use Illuminate\Http\Request;
use Syluxso\PhpPhoneFormat\PhoneFormat;

class AdminController extends Controller
{
    public function user_list() {
        // Variables
        $users = User::all();

        // Page
        $this->page->view('admin.admin--users');
        $this->page->page_title('USERS');
        $this->page->add_variable('users', $users);
        return $this->page->output();
    }

    public function user_form($uuid = false) {
        // Variables
        $user = new CrudUser();
        $user->uuid($uuid);

        // Page
        $this->page->view('admin.admin--user_form');
        $this->page->title('Update User');
        $this->page->page_title('EDIT<span style="color:#fff;">USER</span>');
        $this->page->add_variable('user', $user->user());
        return $this->page->output();
    }

    public function user_submit($uuid, Request $request) {
        // Get the POST body values.

        // Process the user
        $user = new CrudUser();
        $user->uuid($uuid);
        $user->update($request->all());

        // Redirect
        return redirect()->route('admin.users');
    }
}
