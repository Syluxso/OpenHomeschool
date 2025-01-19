@php
    $count = $count ?? 0;
@endphp

@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="text-center">{!! $page_title !!}</h6>
                    <br />
                    <h6>{{ $count }} Jobs</h6>
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col">ID</div>
                                <div class="col">CRATED</div>
                                <div class="col">ATTEMPTS</div>
                                <div class="col">QUEUE</div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group">
                        @foreach($jobs as $job)
                            <a href="/jobs/{{ $job->id }}/view" class="list-group-item">
                                <div class="row">
                                    <div class="col">{{ $job->id}}</div>
                                    <div class="col">{{ date('Y-m-d g:ia', $job->created_at) }}</div>
                                    <div class="col">{{ $job->attempts }}</div>
                                    <div class="col">{{ $job->queue}}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <br />
                    <br />
                    <div class="row justify-content-center">
                        <div class="col">
                            {{ $jobs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
