@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content--canvas">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-4 offset-md-4">
                        <form action="/account/onboarding" method="post">
                            @csrf
                            <div class="input">
                                <div class="input-group">
                                    <div class="input-group-text">First</div>
                                    <input name="first" type="text" placeholder="John" class="form-control" /><br />
                                </div>
                                <br />
                                <div class="input-group">
                                    <div class="input-group-text">Last</div>
                                    <input name="last" type="text" placeholder="Smith" class="form-control" /><br />
                                </div>
                                <br />
                                <div class="input-group">
                                    <div class="input-group-text">Organization</div>
                                    <input name="organization" type="text" placeholder="Organization (optional)" class="form-control" /><br />
                                </div>
                                <br />
                                <input type="submit" value="Complete Onboarding" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
