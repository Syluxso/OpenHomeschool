<?php

namespace App\Http\Controllers;

use App\Http\Helpers\CrudTenant;
use App\Http\Helpers\CrudUser;
use App\Http\Helpers\CrudStage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function update_form() {
        // Variables
        $user_id = Auth::id();
        $user = User::find($user_id);

        // Page
        $this->page->view('accounts.account--update_form');
        $this->page->title('Update User');
        $this->page->page_title('UPDATE<span class="text-muted">ACCOUNT</span>');
        $this->page->add_variable('user', $user);
        return $this->page->output();
    }

    public function update_submit(Request $request) {
        $request->validate([
            'first_name' => 'required|min:1',
            'last_name' => 'required|min:1',
        ]);
        $user = User::findOrFail(Auth::id());
        if(!empty($request->input('pass'))) {
            $pass = $request->input('pass');
            $request->validate([
                'pass' => 'min:6',
            ]);
            $hash_pass = bcrypt($pass);
            $user->password = $hash_pass;
        }
        $user->first = $request->input('first_name');
        $user->last = $request->input('last_name');
        $user->save();
        return redirect()->route('account.update_form');
    }

    public function onboarding_form() {
        // Variables
        $user = Auth::user();

        // Page
        $this->page->view('accounts.onboarding_form');
        $this->page->page_title('Lets get started');
        $this->page->add_variable('user', $user);
        return $this->page->output();
    }

    public function onboarding_submit(Request $request) {
        $values = $request->all();

        // Update user
        $request->validate([
            'first' => 'required|min:1',
            'last' => 'required|min:1',
        ]);

        $account = new CrudUser();
        $account->id(Auth::id());
        $account->update([
            'first' => $values['first'],
            'last' => $values['last'],
        ]);

        // Create Tenant
        if(!empty($values['organization'])) {
            $request->validate([
                'organization' => 'min:1',
            ]);
            $tenant_label = $values['organization'];
        } else {
            $tenant_label = $values['first'] . ' ' . $values['last'];
        }

        $tenant = new CrudTenant();
        $tenant->create([
            'label' => $tenant_label,
            'user_id' => Auth::id(),
            'status' => 1,
        ]);

        // Create Stages
        $stages = new CrudStage();
        $stages->generate(Auth::id(), $tenant->tenant->id);

        return redirect()->route('start');
    }
}
