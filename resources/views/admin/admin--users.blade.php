@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content--canvas">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 offset-md-4">
                        <h6 class="text-center">{{ $page_title }}</h6>
                        <br />
                        <div class="list-group">
                            @foreach($users as $user)
                                <a href="{{ route('admin.user.form', ['uuid' => $user->uuid]) }}" class="list-group-item">
                                    <h6>{{ $user->email }}</h6>
                                    <h6>{{ $user->first }} {{ $user->last }}</h6>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
