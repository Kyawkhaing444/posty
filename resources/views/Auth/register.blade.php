@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">
                    Name
                </label>
                <input type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name')
                border-red-500
                @enderror" name="name" placeholder="Your name" id="name" value="{{ old('name') }}">
                @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">
                    Username
                </label>
                <input type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username')
                border-red-500
                @enderror" name=" username" placeholder="Username" id="username" value="{{ old('username') }}">
                @error('username')
                <div class=" text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="email" class="sr-only">
                    Email
                </label>
                <input type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')
                border-red-500
                @enderror" name="email" placeholder="Your Email" id="email" value="{{ old('email') }}">
                @error('email')
                <div class=" text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">
                    Password
                </label>
                <input type="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')
                border-red-500
                @enderror" name=" password" placeholder="Choose a password" id="password">
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div class="mb-4">
                <label for="password_confrimation" class="sr-only">
                    Password again
                </label>
                <input type="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" name="password_confirmation"
                    placeholder="Repeat your password" id="password_confirmation">
            </div>
            <div>
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full"
                    type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection