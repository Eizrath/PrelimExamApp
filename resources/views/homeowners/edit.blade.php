@extends('layouts.home')

<?php $title='Edit'; ?>

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Edit Homeowner</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('homeowners.update', $homeowner->homeowner_id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="first_name" value="{{ old('first_name', $homeowner->first_name) }}" placeholder="First Name" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl">
        <input type="text" name="middle_name" value="{{ old('middle_name', $homeowner->middle_name) }}" placeholder="Middle Name" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl">
        <input type="text" name="last_name" value="{{ old('last_name', $homeowner->last_name) }}" placeholder="Last Name" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl">
        <input type="email" name="email" value="{{ old('email', $homeowner->email) }}" placeholder="Email" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl">
        <input type="text" name="phone" value="{{ old('phone', $homeowner->phone) }}" placeholder="Phone" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl">
        <input type="text" name="address" value="{{ old('address', $homeowner->address) }}" placeholder="Address" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('homeowners.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </form>
</div>
@endsection
