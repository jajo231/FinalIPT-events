@extends('base')

@section('content')
<div class="container mx-auto p-6">
    @if(session('success'))
        <div id="successMessage" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-4xl font-semibold text-center text-indigo-700">Event List</h1>
            @role('admin')
            <div>
                <a href="{{ route('events.create') }}" class="btn btn-success mb-3">Add Event</a>
            </div>
            @endrole
    <div class="rounded-lg shadow">
        <div>
            <table class="text-left bg-white">
                <thead class="bg-indigo-100 sticky top-0">
                    <tr>
                        <th class="px-6 py-3 text-indigo-600 font-bold uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-indigo-600 font-bold uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-indigo-600 font-bold uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 text-indigo-600 font-bold uppercase tracking-wider">Guest</th>
                        <th class="px-6 py-3 text-indigo-600 font-bold uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-indigo-600 font-bold uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-indigo-600 font-bold uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 overflow-y-auto" style="max-height: 12rem;">
                    @foreach ($events as $event)
                    <tr class="hover:bg-indigo-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $event->name }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $event->date }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $event->location }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $event->guest }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $event->type }}</td>
                        <td class="px-6 py-4 text-gray-700 whitespace-wrap">
                            {{ $event->description }}
                        </td>
                        <td class="px-6 py-4 text-gray-700 text-center">
                        @role('admin')
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">
                                    <i class="fa-solid fa-delete-left"></i>
                                </button>
                            </form>
                        @endrole
                        @role('user')
                            <form id="infoForm-{{ $event->id }}" action="{{ route('events.info', $event->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="fa-solid fa-circle-question"></i>
                                </button>
                            </form>
                            @endrole
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $events->links() }} <!-- This will generate pagination links -->
    </div>
</div>
@endsection

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    tr:hover {
        background-color: #eaefff;
        cursor: pointer;
    }

    td, th {
        padding: 12px 15px;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    th, .whitespace-wrap {
        white-space: normal;
    }

    thead th {
        position: sticky;
        top: 0;
        z-index: 10;
        background-color: #f7f7f7;
    }

    .overflow-x-auto {
        overflow-x: auto;
        max-width: 100%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
</style>
<script>
    window.onload = function() {
        if (document.getElementById("successMessage")) {
            setTimeout(function() {
                document.getElementById("successMessage").style.display = 'none';
            }, 2000);
        }
    };
    </script>
