@extends('layouts.app')
@section('title', 'تسجيل الدخول')
@section('content')

<!-- نموذج تسجيل الدخول -->
<div class="flex justify-center items-center p-8">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-[#2c2d31] mb-6">مرحباً بك مجدداً</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-[#2c2d31] text-sm font-semibold mb-2">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="أدخل بريدك الإلكتروني" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-[#2c2d31] text-sm font-semibold mb-2">كلمة المرور</label>
                <input type="password" name="password" id="password" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="أدخل كلمة المرور" required>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-sm text-[#2c2d31]">تذكرني</label>
                </div>
                <a href="#" class="text-sm text-[#dba235] hover:underline">هل نسيت كلمة المرور؟</a>
            </div>

            <button type="submit" class="w-full mt-6 py-3 bg-[#dba235] text-white font-semibold rounded-lg hover:bg-[#b37a0d] transform hover:scale-105 transition-all duration-300 ease-in-out">
                تسجيل الدخول
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-[#2c2d31]">لا تمتلك حساب؟ <a href="{{ route('register') }}" class="text-[#dba235] hover:underline">إنشاء حساب جديد</a></p>
        </div>
    </div>
</div>

@endsection
