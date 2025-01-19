

@extends('html')
@include('partials.main-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="text-center">ERROR<span style="color:#fff;">LOGS</span></h6>
                    <br />
                    <div class="float-end">
                        <form action="{{ route('logs.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">Clear Logs</button>
                        </form>
                    </div>
                    @if ($logs)
                        <pre><code>{{ $logs }}</code></pre>
                    @else
                        <p>No logs found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
