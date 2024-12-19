<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-6 space-y-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-teal-600">{{ __('Reset Password') }}</h2>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="mt-2 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-600 @error('email') border-red-500 @enderror" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                @error('email')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                <input id="password" type="password" class="mt-2 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-600 @error('password') border-red-500 @enderror" name="password" required>
                @error('password')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Input -->
            <div>
                <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="mt-2 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-600" name="password_confirmation" required>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full py-3 px-4 bg-teal-600 text-white font-semibold rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-600 transition duration-200">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>

</body>

</html>
