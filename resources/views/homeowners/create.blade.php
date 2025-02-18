@extends('layouts.home')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Add Homeowner</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('homeowners.store') }}" method="POST" class="homeowner">
        @csrf
        <input type="text" name="first_name" placeholder="First Name" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl" value="{{ old('first_name') }}">
        <input type="text" name="middle_name" placeholder="Middle Name" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl" value="{{ old('middle_name') }}">
        <input type="text" name="last_name" placeholder="Last Name" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl" value="{{ old('last_name') }}">
        <input type="email" name="email" placeholder="Email" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl" value="{{ old('email') }}">
        <input type="text" name="phone" placeholder="Phone" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl" value="{{ old('phone') }}">
        <input type="text" name="address" placeholder="Address" class="border-4 border-blue-400 p-4 w-full mb-4 rounded-2xl" value="{{ old('address') }}">
        <button type="submit" class="bg-blue-500 text-white px-16 py-4 rounded-xl">Save</button>
    </form>
</div>
@endsection
