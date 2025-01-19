<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class LogViewerController extends Controller
{
    public function index()
    {
        $log_file = storage_path('logs/laravel.log');

        $logs = File::get($log_file);

        if(empty($logs)) {
            $logs = 'No log file found at this time...';
        }

        // Page stuff
        $this->page->page_title("Error logs");
        $this->page->title('Logs');
        $this->page->view('logs-listed');
        $this->page->add_variable('logs', $logs);
        return $this->page->output();

    }

    public function clear() {
        File::put(storage_path('logs/laravel.log'), '');
        return redirect()->route('logs.clear')->with('status', 'Logs have been cleared.');
    }
}
