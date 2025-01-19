<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueueJobsController extends Controller
{
    public function index() {
        $jobs = DB::table('jobs')->paginate(100);;
        $count = (string) DB::table('jobs')->count();

        // Page
        $this->page->view('jobs');
        $this->page->title('Jobs');
        $this->page->page_title('QUEUE<span style="color:#fff">JOBS</span>');
        $this->page->add_variable('jobs', $jobs);
        $this->page->add_variable('count', $count);
        return $this->page->output();
    }

    public function job_view($job_id) {
        $job = DB::table('jobs')->where('id', $job_id)->first();
        $payload = json_decode($job->payload);
        $command_name = $payload->data->commandName;
        $command = unserialize($payload->data->command);

        // Page
        $this->page->view('job');
        $this->page->title('Jobs');
        $this->page->page_title('JOB<span style="color:#fff">VIEW</span>');
        $this->page->add_variable('job', $job);
        $this->page->add_variable('payload', $payload);
        $this->page->add_variable('command_name', $command_name);
        $this->page->add_variable('command', $command);
        return $this->page->output();
    }
}
