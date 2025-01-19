@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="text-center">{!! $page_title !!}</h6>
                    <br />
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="float-end">{{ $job->id}}</div>
                            <h6>Job ID</h6>
                        </div>
                        <div class="list-group-item">
                            <div class="float-end">{{ date('M d, Y g:ia', $job->created_at) }}</div>
                            <h6>Created</h6>
                        </div>
                        <div class="list-group-item">
                            <div class="float-end">{{ $job->attempts}}</div>
                            <h6>Attempts</h6>
                        </div>
                        <div class="list-group-item">
                            <div class="float-end">{{ $job->queue}}</div>
                            <h6>Queue Name</h6>
                        </div>
                        <div class="list-group-item">
                            <div class="float-end">{{ $command_name }}</div>
                            <h6>Command Name</h6>
                        </div>
                        <div class="list-group-item">
                            <h6>Command</h6>
                            <pre><code>{{ var_dump($command) }}</code></pre>
                        </div>
                        <div class="list-group-item">
                            <h6>Payload</h6>
                            <pre><code>{{ var_dump($payload) }}</code></pre>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
