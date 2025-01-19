@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content--canvas">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 offset-md-3">
                    <h1 class="h3">New Opportunity</h1>

                    <form action="/opportunities/create" method="post">
                        @csrf
                        @error('name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-floating">
                            <input name="name" type="text" placeholder="Lead name" class="form-control" />
                            <label>Name</label>
                        </div><br />
                        @error('value')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-floating">
                            <input name="value" type="number" placeholder="Deal value" class="form-control" />
                            <label>Value</label>
                        </div><br />
                        <input type="submit" value="Create" class="btn btn-success"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
