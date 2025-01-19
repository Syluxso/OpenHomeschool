@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content--canvas">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 offset-md-3">
                    <h1 class="h3">Update opportunity</h1>
                    <form action="/opportunities/{{ $opportunity->uuid }}/update" method="post">
                        @csrf
                        <div class="form-floating">
                            <input name="name" type="text" placeholder="Lead name" value="{{ $opportunity->label }}" class="form-control" />
                            <label>Name</label>
                        </div><br />
                        <div class="form-floating">
                            <input name="value" type="number" placeholder="Deal value" value="{{ $opportunity->value }}" class="form-control" />
                            <label>Value</label>
                        </div><br />
                        <input type="submit" value="Update" class="btn btn-success"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
