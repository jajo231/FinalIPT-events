@extends('base')

@section('content')
<div class="text-end">
    <a href="{{ route('events.index') }}" class="btn btn-secondary mr-5 mt-2">Back</a>
</div>
<div class="container p-4 sm:p-6 max-w-xl">
    <div class="bg-white rounded-lg shadow-xl p-6">
        <form action="{{ route('events.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="flex flex-wrap">
                <div class="">
                    <label for="name" class="block text-gray-700 text-sm font-semibold">Event Name</label>
                    <div class="p-2 bg-gray-100 rounded-md">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>

                <div class="ml-5">
                    <label for="date" class="block text-gray-700 text-sm font-semibold">Date</label>
                    <div class="p-2 bg-gray-100 rounded-md">
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                </div>
            </div>

            <div>
                <label for="location" class="block text-gray-700 text-sm font-semibold">Location</label>
                <div class="p-2 bg-gray-100 rounded-md">
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
            </div>

            <div>
                <label for="guest" class="block text-gray-700 text-sm font-semibold">Guest</label>
                <div class="p-2 bg-gray-100 rounded-md">
                    <input type="text" class="form-control" id="guest" name="guest" required>
                </div>
            </div>

            <div>
                <label for="type" class="block text-gray-700 text-sm font-semibold">Type</label>
                <div class="p-2 bg-gray-100 rounded-md">
                    <input type="text" class="form-control" id="type" name="type" required>
                </div>
            </div>

            <div>
                <label for="description" class="block text-gray-700 text-sm font-semibold">Description</label>
                <div class="p-2 bg-gray-100 rounded-md">
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-md">Create Event</button>
            </div>
        </form>
    </div>
</div>
@endsection
