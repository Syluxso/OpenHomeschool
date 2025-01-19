<?php

namespace App\Http\Controllers;

use App\Http\Formatters\StagesViews;
use App\Http\Helpers\UsersPoints;
use App\Http\Resources\StageDriver;
use App\Models\Activity;
use App\Models\Action;
use Illuminate\Support\Facades\Auth;
use Carbon\Exceptions\Exception;
use Carbon\Carbon;

class StartController extends Controller
{
    public function start() {
        $stages = StageDriver::stages(Auth::id());
        $stages = StagesViews::list_all($stages);

        // Page
        $this->page->view('start');
        $this->page->title('Welcome');
        $this->page->page_title('Welcome');
        $this->page->add_variable('stages', $stages);
        return $this->page->output();
    }
}
