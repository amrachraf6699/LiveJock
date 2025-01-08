@extends('layouts.app')
@section('title', 'تسجيل حساب جديد')
@section('content')

<!-- نموذج تسجيل حساب جديد -->
<div class="flex justify-center items-center p-8">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-[#2c2d31] mb-6">انشاء حساب جديد</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <!-- الحقل الأول: الاسم -->
            <div class="mb-4">
                <label for="name" class="block text-[#2c2d31] text-sm font-semibold mb-2">الاسم الكامل</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg text-[#2c2d31] @error('name') border-red-500 @enderror" placeholder="أدخل اسمك الكامل" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- الحقل الثاني: البريد الإلكتروني -->
            <div class="mb-4">
                <label for="email" class="block text-[#2c2d31] text-sm font-semibold mb-2">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg text-[#2c2d31] @error('email') border-red-500 @enderror" placeholder="أدخل بريدك الإلكتروني" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- الحقل الثالث: رقم الهاتف -->
            <div class="mb-4">
                <label for="phone" class="block text-[#2c2d31] text-sm font-semibold mb-2">رقم الهاتف</label>
                <input type="text" name="phone" id="phone" class="w-full p-3 border border-gray-300 rounded-lg text-[#2c2d31] @error('phone') border-red-500 @enderror" placeholder="أدخل رقم هاتفك" value="{{ old('phone') }}" required>
                @error('phone')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- الحقل الرابع: كلمة المرور -->
            <div class="mb-4">
                <label for="password" class="block text-[#2c2d31] text-sm font-semibold mb-2">كلمة المرور</label>
                <input type="password" name="password" id="password" class="w-full p-3 border border-gray-300 rounded-lg text-[#2c2d31] @error('password') border-red-500 @enderror" placeholder="أدخل كلمة المرور" required>
                @error('password')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- الحقل الخامس: تأكيد كلمة المرور -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-[#2c2d31] text-sm font-semibold mb-2">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-3 border border-gray-300 rounded-lg text-[#2c2d31] @error('password_confirmation') border-red-500 @enderror" placeholder="تأكيد كلمة المرور" required>
                @error('password_confirmation')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full mt-6 py-3 bg-[#dba235] text-white font-semibold rounded-lg hover:bg-[#b37a0d] transform hover:scale-105 transition-all duration-300 ease-in-out">
                إنشاء حساب
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-[#2c2d31]">هل لديك حساب؟ <a href="{{ route('login') }}" class="text-[#dba235] hover:underline">تسجيل الدخول</a></p>
        </div>
    </div>
</div>

@endsection
