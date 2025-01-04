@extends('auth.user.master')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        الملف الشخصي
    </h2>
</x-slot>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: right;
    }

    body {
        background-color: #f3f4f6;
        direction: rtl;
    }

    .container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    .profile-header {
        background-color: #fff;
        padding: 1.5rem;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .profile-header h1 {
        color: #1f2937;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .card {
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        color: #1f2937;
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }

    .card-subtitle {
        color: #6b7280;
        font-size: 0.875rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        color: #374151;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .form-input {
        width: 50%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        font-size: 1rem;
        transition: border-color 0.2s;
    }

    .form-input:focus {
        outline: none;
        border-color: #4f46e5;
        ring: 2px solid #4f46e5;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 0.375rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #4338ca;
    }

    .btn-danger {
        background-color: #ef4444;
        color: white;
        border: none;
    }

    .btn-danger:hover {
        background-color: #dc2626;
    }

    .btn-secondary {
        background-color: #9ca3af;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #6b7280;
    }

    .modal-content {
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
        max-width: 500px;
        width: 90%;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
    }
</style>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section class="space-y-6">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 card-title text-right">
                            معلومات الملف الشخصي
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 card-subtitle text-right">
                            قم بتحديث معلومات حسابك وعنوان بريدك الإلكتروني.
                        </p>
                    </header>

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" value="الاسم" class="form-label text-right" />
                            <x-text-input id="name" name="name" type="text" class="form-input text-right" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" value="البريد الإلكتروني" class="form-label text-right" />
                            <x-text-input id="email" name="email" type="email" class="form-input" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800 text-right">
                                        عنوان بريدك الإلكتروني غير مؤكد.

                                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-right">
                                            انقر هنا لإعادة إرسال رسالة التحقق.
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600 text-right">
                                            تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center gap-4 text-right">
                            <x-primary-button class="btn btn-primary">حفظ</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 "
                                >تم الحفظ.</p>
                            @endif
                        </div>
                    </form>
                </section>

                <section class="space-y-6">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 card-title text-right">
                            تحديث كلمة المرور
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 card-subtitle text-right">
                            تأكد من أن حسابك يستخدم كلمة مرور طويلة وعشوائية للبقاء آمناً.
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="update_password_current_password" value="كلمة المرور الحالية" class="form-label text-right" />
                            <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-input" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="update_password_password" value="كلمة المرور الجديدة" class="form-label text-right" />
                            <x-text-input id="update_password_password" name="password" type="password" class="form-input" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="update_password_password_confirmation" value="تأكيد كلمة المرور" class="form-label text-right" />
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-input" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4 text-right">
                            <x-primary-button class="btn btn-primary">حفظ</x-primary-button>

                            @if (session('status') === 'password-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >تم الحفظ.</p>
                            @endif
                        </div>
                    </form>
                </section>

                
            </div>
        </div>
    </div>
</div>
@endsection