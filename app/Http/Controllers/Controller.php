<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Helpers\WebPage;

class Controller extends BaseController
{
    public $page;
    use AuthorizesRequests, ValidatesRequests;

    function __construct() {
        $this->page = new WebPage('test');
    }
}
