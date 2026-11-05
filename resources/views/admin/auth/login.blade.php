<!DOCTYPE html>
<html lang="en" class="h-full bg-atelier-dark text-paper antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atelier Console Authentication — Avila Classic</title>

    <!-- Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center p-4 sm:p-6 bg-[#0E0F12] font-sans selection:bg-saddle selection:text-white">

    <div class="w-full max-w-md">
        
        <!-- Header & Emblem -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-saddle/10 border border-saddle/30 text-saddle mb-4 shadow-inner">
                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect width="18" height="14" x="3" y="6" rx="2"/>
                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                    <line x1="8" y1="13" x2="16" y2="13"/>
                </svg>
            </div>
            <h1 class="font-serif text-3xl sm:text-4xl text-white font-medium tracking-tight">Avila Classic</h1>
            <p class="text-xs uppercase tracking-[0.25em] text-saddle font-mono mt-1">Industrial Atelier Console</p>
        </div>

        <!-- Card Container -->
        <div class="bg-atelier-card border border-atelier-border rounded-xl p-6 sm:p-8 shadow-2xl backdrop-blur-md">
            
            <div class="mb-6 pb-4 border-b border-white/5">
                <h2 class="text-sm font-semibold text-white uppercase tracking-wider font-mono">Ledger Access Gate</h2>
                <p class="text-xs text-gray-400 mt-1">Authenticate credentials to access corporate publishing tools.</p>
            </div>

            <!-- Flash Error -->
            @if(isset($errors) && $errors->any())
                <div class="mb-5 p-3.5 bg-red-950/50 border border-red-800 text-red-200 rounded-md text-xs" role="alert" aria-live="polite">
                    <div class="font-semibold mb-1">Access Authentication Failed</div>
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4" x-data="{ submitting: false }" @submit="submitting = true">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-xs font-mono uppercase tracking-wider text-gray-300 mb-1.5">
                        Administrator Email
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email', 'admin@avilaclassic.com') }}" 
                           required 
                           autocomplete="email"
                           class="w-full px-3.5 py-2.5 bg-black/40 border border-white/15 rounded-md text-white placeholder-gray-500 text-base sm:text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle focus-visible:border-saddle transition-all"
                           placeholder="admin@avilaclassic.com">
                </div>

                <!-- Password Input -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-mono uppercase tracking-wider text-gray-300">
                            Security Key / Passphrase
                        </label>
                    </div>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required 
                           value="password123"
                           autocomplete="current-password"
                           class="w-full px-3.5 py-2.5 bg-black/40 border border-white/15 rounded-md text-white placeholder-gray-500 text-base sm:text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle focus-visible:border-saddle transition-all"
                           placeholder="••••••••••••">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center pt-1">
                    <label class="flex items-center gap-2 cursor-pointer text-xs text-gray-300 select-none">
                        <input type="checkbox" 
                               name="remember" 
                               checked
                               class="w-4 h-4 rounded border-white/20 bg-black/40 text-saddle focus:ring-saddle focus:ring-offset-0">
                        <span>Maintain session on this terminal</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        :disabled="submitting"
                        class="w-full min-h-[44px] flex items-center justify-center gap-2 px-4 py-2.5 bg-saddle hover:bg-saddle-hover text-white rounded-md text-xs font-semibold uppercase tracking-wider font-mono shadow-md transition-all duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-saddle active:scale-[0.99] disabled:opacity-60 cursor-pointer">
                    <svg x-show="submitting" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" x-cloak>
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span x-text="submitting ? 'Verifying Credentials…' : 'Enter Atelier Operating System'">Enter Atelier Operating System</span>
                </button>
            </form>

            <!-- Pre-seeded Credentials Callout -->
            <div class="mt-6 pt-4 border-t border-white/5 bg-white/[0.02] -mx-6 -mb-6 p-4 rounded-b-xl text-[11px] font-mono text-gray-400">
                <div class="flex items-center gap-1.5 text-saddle font-semibold mb-1">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>System Super Admin Credentials</span>
                </div>
                <div class="flex justify-between items-center py-0.5">
                    <span class="text-gray-400">Login:</span>
                    <code class="text-gray-200">admin@avilaclassic.com</code>
                </div>
                <div class="flex justify-between items-center py-0.5">
                    <span class="text-gray-400">Passphrase:</span>
                    <code class="text-gray-200">password123</code>
                </div>
            </div>

        </div>

        <!-- Back to Public Site -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-xs font-mono text-gray-400 hover:text-white transition-colors">
                ← Return to Public Storefront
            </a>
        </div>

    </div>

</body>
</html>
