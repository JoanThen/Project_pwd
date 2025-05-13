<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SARPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="min-h-screen font-sans text-white flex items-center justify-center p-4"
      style="background: radial-gradient(circle at center, #0d47a1 0%, #0a1931 60%, #000000 100%);">

    <div class="w-full max-w-md">
        <!-- Logo/Brand -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white drop-shadow">SARPAS</h1>
            <p class="text-slate-200 text-sm mt-1">Sistem Administrasi Resource Planning</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header -->
            <div class="py-5 px-6"
                 style="background: radial-gradient(circle at center, #0d47a1 0%, #0a1931 60%, #000000 100%);">
                <h2 class="text-xl font-medium text-white">Create Account</h2>
                <p class="text-sky-50 text-sm mt-1">Join our platform today</p>
            </div>
            
            <!-- Form -->
            <div class="p-6">
                @if ($errors->any())
                    <div class="bg-rose-50 border-l-4 border-rose-300 text-rose-600 p-3 mb-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="ml-3">
                                <ul class="list-disc ml-5 text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-slate-600 text-sm font-medium mb-2">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-slate-400"></i>
                            </div>
                            <input type="text" name="name" id="name" required value="{{ old('name') }}"
                                   class="w-full pl-10 px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-sky-400 focus:border-sky-400 text-black"
                                   placeholder="John Doe">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="block text-slate-600 text-sm font-medium mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-slate-400"></i>
                            </div>
                            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                                   class="w-full pl-10 px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-sky-400 focus:border-sky-400 text-black"
                                   placeholder="your@email.com">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="block text-slate-600 text-sm font-medium mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-slate-400"></i>
                            </div>
                            <input type="password" name="password" id="password" required
                                   class="w-full pl-10 px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-sky-400 focus:border-sky-400 text-black"
                                   placeholder="••••••••">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-slate-600 text-sm font-medium mb-2">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-slate-400"></i>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                   class="w-full pl-10 px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-sky-400 focus:border-sky-400 text-black"
                                   placeholder="••••••••">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="role" class="block text-slate-600 text-sm font-medium mb-2">Account Type</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user-tag text-slate-400"></i>
                            </div>
                            <select name="role" id="role" required
                                    class="w-full pl-10 px-3 py-2 border border-slate-200 rounded-md focus:outline-none focus:ring-1 focus:ring-sky-400 focus:border-sky-400 appearance-none bg-white text-slate-600 text-black">
                                <option value="user" selected>User</option>
                                <option value="admin">Admin</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-slate-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <div class="flex items-center">
                            <input type="checkbox" id="terms" name="terms" required class="h-4 w-4 text-sky-500 focus:ring-sky-400 border-slate-300 rounded">
                            <label for="terms" class="ml-2 block text-sm text-slate-500">
                                I agree to the <a href="#" class="text-sky-500 hover:text-sky-600">Terms of Service</a> and <a href="#" class="text-sky-500 hover:text-sky-600">Privacy Policy</a>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-sky-500 text-white px-4 py-2 rounded-md hover:bg-sky-600 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:ring-offset-1 transition-all duration-200 font-medium">
                        Create Account
                    </button>
                    
                    <div class="text-center mt-5">
                        <span class="text-slate-500 text-sm">Already have an account?</span>
                        <a href="{{ route('login') }}" class="text-sky-500 hover:text-sky-600 text-sm font-medium ml-1">
                            Login here
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-center mt-6 text-slate-500 text-xs">
            &copy; 2025 SARPAS. All rights reserved.
        </div>
    </div>
</body>
</html>
