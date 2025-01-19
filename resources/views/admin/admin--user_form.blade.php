@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content--canvas">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 offset-md-4">
                        <form action="{{ route('admin.user.form', ['uuid' => $user->uuid]) }}" method="post">
                            @csrf
                            <div class="input">
                                <input name="email" type="text" placeholder="email" disabled="true" value="{{ $user->email }}" class="form-control" /><br />
                                <input name="first" type="text" placeholder="first" value="{{ $user->first}}" class="form-control" /><br />
                                <input name="last" type="text" placeholder="last" value="{{ $user->last}}" class="form-control" /><br />
                                <input name="phone" type="text" placeholder="(xxx) xxx-xxxx" value="{{ $user->phone}}" class="form-control" /><br />
                                <input name="pass" type="password" placeholder="********" class="form-control" /><br />
                                <input type="submit" value="Update" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
