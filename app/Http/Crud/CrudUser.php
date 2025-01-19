<?php

namespace App\Http\Crud;

use App\Models\User;

class CrudUser {
    public $user = false;
    public $message = 'instantiated.';

    private $request = false;

    function __construct($user = false, $request = false) {
        $this->set_user($user);
        $this->set_request($request);
    }


    /*
     * Setters
     */
    function set_user($user = false) {
        $message = '$user must be a class.';
        if(!empty($user)) {
            if(is_object($user)) {
                $this->user = $user;
                $message = 'ok';
            }
        }
        $this->set_message($message);
    }

    public function set_request($request = false) {
        if(!empty($request)) {
            $this->request = $request;
        }
    }

    public function set_message($message = false) {
        $this->message = $message;
    }

    public function clean() {
        $request = $this->request;
        $values = $request->all();

        if(!empty($values['pass'])) {
            $request->validate([
                'pass' => 'min:6',
            ]);
            $pass = $request->input('pass');
            $hash_pass = bcrypt($pass);
            $values['password'] = $hash_pass;
        }

        // If phone, validate
        if(!empty($values['phone'])) {
            $phone = $values['phone'];

            $request->validate([
                'phone' => 'min:10|max:10',
            ]);
        }
    }

    /*
     * Return
     */
    public function user() {
        return $this->user;
    }

    public function message() {
        return $this->message;
    }

    /*
     * Search and load by x
     */
    public function uuid($uuid) {
        $user = User::where('uuid', $uuid)->first();
        $this->set_user($user);
    }

    public function id($id) {
        $user = User::where('id', $id)->first();
        $this->set_user($user);
    }

    /*
     * CRUD+
     */
    public function create($array) {
        $user = User::create($array);
        $this->set_user($user);
    }

    public function update($values) {
        unset($values['_token']);
        $user = $this->user;
        $user->update($values);
        $this->set_user($user);
    }

    public function archive() {
        $this->update(['status']);
    }
}
