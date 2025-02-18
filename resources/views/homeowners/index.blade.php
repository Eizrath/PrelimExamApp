@extends('layouts.home')

<?php $title='Homepage'; ?>

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Homeowners List</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4" id="success-message">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('homeowners.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-5 inline-block">Add Homeowner</a>

    <div class="overflow-x-auto bg-white shadow-xl">
        <table class="w-full border-collapse border border-gray-100">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-3">ID</th>
                    <th class="border p-3">Name</th>
                    <th class="border p-3">Email</th>
                    <th class="border p-3">Phone</th>
                    <th class="border p-3">Address</th>
                    <th class="border p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($homeowners as $homeowner)
                    <tr>
                        <td class="border p-2">{{ $homeowner->homeowner_id }}</td>
                        <td class="border p-2">{{ $homeowner->first_name }} {{ $homeowner->last_name }}</td>
                        <td class="border p-2">{{ $homeowner->email }}</td>
                        <td class="border p-2">{{ $homeowner->phone }}</td>
                        <td class="border p-2">{{ $homeowner->address }}</td>
                        <td class="border p-2">
                            <a href="{{ route('homeowners.edit', $homeowner) }}" class="text-white bg-green-700 px-4 py-2 border rounded-full ">Edit</a>
                            <form action="{{route('homeowners.destroy', $homeowner)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white px-3 py-2 bg-red-500 border rounded-full" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    setTimeout(function() {
        let successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.transition = 'opacity 1s';
            successMessage.style.opacity = '0';
            setTimeout(() => successMessage.remove(), 1000);
        }
    }, 3000);
</script>
@endsection
