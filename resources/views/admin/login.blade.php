<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login — HYLUMINIX</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased bg-slate-100 flex items-center justify-center">
    <div class="w-full max-w-md px-6">
        <!-- Brand -->
        <div class="flex items-center justify-center mb-8">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-teal-400 via-blue-500 to-violet-600 flex items-center justify-center shadow-lg mr-3">
                <span class="text-white font-extrabold text-2xl leading-none">H</span>
            </div>
            <div>
                <span class="text-2xl font-bold text-slate-900">HYLUMINIX</span>
                <div class="text-xs text-slate-500 font-medium tracking-wide">ADMIN PANEL</div>
            </div>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-8">
            <h2 class="text-xl font-semibold text-slate-900 mb-1">Sign in</h2>
            <p class="text-sm text-slate-500 mb-6">Access the leads management dashboard.</p>

            @if(session('error'))
                <div class="mb-4 px-4 py-3 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           class="input px-3 py-2.5 text-sm"
                           placeholder="admin@hyluminix.com">
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
                    <input type="password" id="password" name="password" required
                           class="input px-3 py-2.5 text-sm"
                           placeholder="••••••••">
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-primary-600 shadow-sm focus:ring-primary-500">
                        <span class="ml-2 text-sm text-slate-600">Remember me</span>
                    </label>
                </div>

                <button type="submit"
                        class="w-full btn btn-lg text-white font-semibold rounded-lg transition-all duration-200"
                        style="background: linear-gradient(90deg, #39C6C8 0%, #5B79C9 50%, #9A3DB8 100%); box-shadow: 0 2px 12px rgba(91,121,201,0.3);">
                    Sign In
                </button>
            </form>
        </div>

        <p class="mt-6 text-center text-xs text-slate-400">&copy; {{ date('Y') }} HYLUMINIX. All rights reserved.</p>
    </div>
</body>
</html>
