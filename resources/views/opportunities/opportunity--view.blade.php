@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content--canvas">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 offset-md-3">
                    {!! $page_title !!}
                    <br />
                    <br />
                    <div class="card card-body">
                        <h6>
                            <span class="text-uppercase">{{ $stage->label }}</span>
                            <span class="text-muted float-end">{{ $value }}</span>
                        </h6>
                        <h1>{{ $opportunity->label }}</h1>
                    </div>
                    <br />
                    <div class="float-end">
                        Move to
                        <div class="btn-group">
                            {!! $stage_toggle !!}
                        </div>
                    </div>
                    <a href="/opportunities/{{ $opportunity->uuid }}/update" class="btn btn-sm btn-primary">Update</a>
                </div>

            </div>
        </div>
    </div>
@endsection
