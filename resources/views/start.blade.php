@extends('html')
@include('partials.main-nav')
@section('content')
<div class="content--canvas">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <br />
                <h1 class="h3">Opportunities by stage</h1>
                {!! $stages !!}
            </div>
        </div>
    </div>
</div>
<br />
<br />
@endsection
