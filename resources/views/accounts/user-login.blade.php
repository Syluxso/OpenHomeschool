@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content--canvas">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 offset-md-3">
                    <h1 class="h3">LOGIN</h1>
                    <form action="/login" method="post">
                        @csrf
                        @error('email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-floating">
                            <input name="email" type="text" placeholder="name@website.com" class="form-control" />
                            <label>Email</label>
                        </div><br />
                        @error('pass')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-floating">
                            <input name="pass" type="password" placeholder="********" class="form-control" />
                            <label>Password</label>
                        </div><br />
                        <input type="submit" value="Login" class="btn btn-primary"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
