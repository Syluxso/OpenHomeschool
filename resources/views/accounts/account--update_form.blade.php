@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content--canvas">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 offset-md-3">
                    <h1>{!! $page_title !!}</h1>
                    <br />
                    @include('partials.system--messages')
                    <form action="/account/update" method="post">
                        @csrf
                        <div class="form-floating">
                            <input name="email" type="text" placeholder="email" disabled="true" value="{{ $user->email }}" class="form-control" />
                            <label>Email</label>
                        </div><br />

                        @error('first')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating">
                            <input name="first_name" type="text" placeholder="First name" value="{{ old('first', $user->first) }}" class="form-control" />
                            <label>First name</label>
                        </div><br />

                        @error('last')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating">
                            <input name="last_name" type="text" placeholder="Last name" value="{{ old('last', $user->last) }}" class="form-control" />
                            <label>Last name</label>
                        </div><br />

                        <div class="form-floating">
                            <input name="pass" type="password" placeholder="********" class="form-control" /><br />
                            <label>Password</label>
                        </div>
                        <input type="submit" value="Update" class="btn btn-lg btn-primary"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
