@extends('base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header bg-primary text-dark">
                    <a href="{{ route('events.index') }}" class="text-white" style="text-decoration: none;">EVENTS</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total number of events</h5>
                    <p class="card-text">{{ $eventCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
