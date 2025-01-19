@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content--canvas">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 offset-md-4">
                    <h6 class="text-center">USER<span style="color:#fff;">REGISTER </span></h6>
                    <br />
                    <form action="/register" method="post">
                        @csrf
                        <div class="input">
                            <input name="email" type="text" placeholder="name@website.com"  class="form-control" /><br />
                            <input name="pass" type="password" placeholder="********"  class="form-control" /><br />
                            <input type="submit" value="Register" class="btn btn-success"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

