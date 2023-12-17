@extends('base')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="text-xl font-semibold">System Activity Logs</h2>
    </div>

    <div class="card shadow-lg">
        <div class="card-header bg-dark text-light">
            <h5 class="mb-0">Log Details</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover m-0">
                <thead>
                    <tr class="text-dark bg-light">
                        <th scope="col">ID</th>
                        <th scope="col">Entry</th>
                        <th scope="col">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->log_entry }}</td>
                        <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 1000px;
        margin: auto;
    }

    .card {
        border: none;
        border-radius: 10px;
    }

    .card-header {
        border-bottom: 1px solid rgba(0,0,0,.125);
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        border-bottom: 2px solid #dee2e6;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection
