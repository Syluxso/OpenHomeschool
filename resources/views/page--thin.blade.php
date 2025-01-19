@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content--canvas">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 offset-md-3">

                    @if(!empty($page_title))
                        {!! $page_title !!}
                    @endif
                    @include('partials.system--messages')
                    {!! $content !!}
                </div>

            </div>
        </div>
    </div>
@endsection
