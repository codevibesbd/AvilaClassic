<!DOCTYPE html>
<html lang="en" class="h-full bg-paper text-ink antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Operating System') — Avila Classic Atelier</title>

    <!-- Authentic Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="h-full flex flex-col font-sans bg-[#F7F5F0] text-ink selection:bg-saddle selection:text-white"
      x-data="{ 
          sidebarOpen: false, 
          sidebarCollapsed: localStorage.getItem('admin_sidebar_collapsed') === 'true',
          toggleSidebar() {
              this.sidebarCollapsed = !this.sidebarCollapsed;
              localStorage.setItem('admin_sidebar_collapsed', this.sidebarCollapsed);
          }
      }">

    <!-- Skip link for keyboard accessibility -->
    <a href="#admin-main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 z-50 bg-saddle text-white px-4 py-2 text-xs uppercase tracking-wider font-semibold rounded shadow-lg">
        Skip to main console
    </a>

    <!-- Mobile Drawer Backdrop -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 z-40 bg-black/60 backdrop-blur-xs lg:hidden" 
         aria-hidden="true" 
         x-cloak></div>

    <div class="flex h-full w-full overflow-hidden">
        
        <!-- SIDEBAR -->
        <aside :class="{
                   'w-64': !sidebarCollapsed, 
                   'w-20': sidebarCollapsed,
                   '-translate-x-full lg:translate-x-0': !sidebarOpen,
                   'translate-x-0': sidebarOpen
               }"
               class="fixed inset-y-0 left-0 z-50 flex flex-col bg-atelier-dark text-paper border-r border-atelier-border transition-all duration-300 ease-in-out lg:static lg:z-auto">
            
            <!-- Sidebar Header & Brand -->
            <div class="h-16 flex items-center justify-between px-4 border-b border-atelier-border bg-[#0D0E11]">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 overflow-hidden group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle rounded p-1">
                    <div class="w-9 h-9 rounded bg-saddle/15 border border-saddle/40 flex items-center justify-center shrink-0 text-saddle transition-transform group-hover:scale-105">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect width="18" height="14" x="3" y="6" rx="2"/>
                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                            <line x1="8" y1="13" x2="16" y2="13"/>
                        </svg>
                    </div>
                    <div class="flex flex-col leading-tight whitespace-nowrap" x-show="!sidebarCollapsed" x-transition>
                        <span class="font-serif text-lg tracking-wide text-white font-medium">Avila Classic</span>
                        <span class="text-[9px] uppercase tracking-[0.2em] text-saddle font-mono">Atelier OS v2.0</span>
                    </div>
                </a>
                
                <!-- Close button for mobile -->
                <button type="button" 
                        @click="sidebarOpen = false" 
                        class="p-1.5 rounded text-gray-400 hover:text-white hover:bg-white/10 lg:hidden focus-visible:ring-2 focus-visible:ring-saddle"
                        aria-label="Close sidebar menu">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-6 scrollbar-thin scrollbar-thumb-white/10 scrollbar-track-transparent" aria-label="Admin Navigation">
                
                <!-- Group: Core Overview -->
                <div>
                    <p class="px-2 mb-2 text-[10px] font-mono uppercase tracking-[0.2em] text-gray-400" x-show="!sidebarCollapsed" x-transition>
                        Console
                    </p>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.dashboard') ? 'bg-saddle text-white font-semibold shadow-xs' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                <span class="truncate" x-show="!sidebarCollapsed" x-transition>Overview Ledger</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Group: Catalog Management -->
                <div>
                    <p class="px-2 mb-2 text-[10px] font-mono uppercase tracking-[0.2em] text-gray-400" x-show="!sidebarCollapsed" x-transition>
                        Merchandise
                    </p>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.products.index') }}" 
                               class="flex items-center justify-between px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.products.*') ? 'bg-saddle text-white font-semibold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <div class="flex items-center gap-3">
                                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    <span class="truncate" x-show="!sidebarCollapsed" x-transition>Product Catalog</span>
                                </div>
                                <span class="text-[10px] bg-white/20 px-1.5 py-0.5 rounded font-mono" x-show="!sidebarCollapsed" x-transition>
                                    {{ \App\Models\Product::count() }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Group: Editorial & Content -->
                <div>
                    <p class="px-2 mb-2 text-[10px] font-mono uppercase tracking-[0.2em] text-gray-400" x-show="!sidebarCollapsed" x-transition>
                        Editorial
                    </p>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.hero-slides.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.hero-slides.*') ? 'bg-saddle text-white font-semibold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="truncate" x-show="!sidebarCollapsed" x-transition>Hero Showcases</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.homepage.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.homepage.*') ? 'bg-saddle text-white font-semibold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <span class="truncate" x-show="!sidebarCollapsed" x-transition>Homepage Sections</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.pages.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.pages.*') ? 'bg-saddle text-white font-semibold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span class="truncate" x-show="!sidebarCollapsed" x-transition>Site Content Pages</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Group: Inquiries & Dispatch -->
                <div>
                    <p class="px-2 mb-2 text-[10px] font-mono uppercase tracking-[0.2em] text-gray-400" x-show="!sidebarCollapsed" x-transition>
                        Client Relations
                    </p>
                    <ul class="space-y-1">
                        <li>
                            @php $newInquiriesCount = \App\Models\Inquiry::where('status', 'new')->count(); @endphp
                            <a href="{{ route('admin.inquiries.index') }}" 
                               class="flex items-center justify-between px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.inquiries.*') ? 'bg-saddle text-white font-semibold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <div class="flex items-center gap-3">
                                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="truncate" x-show="!sidebarCollapsed" x-transition>Inquiries Dispatch</span>
                                </div>
                                @if($newInquiriesCount > 0)
                                    <span class="text-[10px] bg-red-500 text-white font-mono font-bold px-1.5 py-0.5 rounded-full" x-show="!sidebarCollapsed" x-transition>
                                        {{ $newInquiriesCount }}
                                    </span>
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Group: System Media & Structure -->
                <div>
                    <p class="px-2 mb-2 text-[10px] font-mono uppercase tracking-[0.2em] text-gray-400" x-show="!sidebarCollapsed" x-transition>
                        Structure
                    </p>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.navigation.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.navigation.*') ? 'bg-saddle text-white font-semibold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                </svg>
                                <span class="truncate" x-show="!sidebarCollapsed" x-transition>Navigation Menus</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.media.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.media.*') ? 'bg-saddle text-white font-semibold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <span class="truncate" x-show="!sidebarCollapsed" x-transition>Media Library</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Group: Governance & Preferences -->
                <div>
                    <p class="px-2 mb-2 text-[10px] font-mono uppercase tracking-[0.2em] text-gray-400" x-show="!sidebarCollapsed" x-transition>
                        Governance
                    </p>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.settings.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.settings.*') ? 'bg-saddle text-white font-semibold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="truncate" x-show="!sidebarCollapsed" x-transition>Site Settings</span>
                            </a>
                        </li>
                        @if(auth()->user()->isSuperAdmin())
                        <li>
                            <a href="{{ route('admin.users.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.users.*') ? 'bg-saddle text-white font-semibold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span class="truncate" x-show="!sidebarCollapsed" x-transition>Admin Accounts</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('admin.profile.edit') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 rounded text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle {{ request()->routeIs('admin.profile.*') ? 'bg-saddle text-white font-semibold' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="truncate" x-show="!sidebarCollapsed" x-transition>My Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>

            <!-- Sidebar Footer & User Profile -->
            <div class="p-3 border-t border-atelier-border bg-[#0D0E11] space-y-2">
                <a href="{{ route('home') }}" target="_blank" 
                   class="flex items-center justify-between w-full px-2.5 py-1.5 rounded text-[11px] font-mono text-gray-400 hover:text-white hover:bg-white/5 transition-colors focus-visible:ring-2 focus-visible:ring-saddle">
                    <span class="truncate" x-show="!sidebarCollapsed" x-transition>Public Front ↗</span>
                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>

                <div class="flex items-center justify-between pt-2 border-t border-white/10">
                    <div class="flex items-center gap-2.5 overflow-hidden">
                        <div class="w-7 h-7 rounded-full bg-saddle text-white text-xs font-semibold flex items-center justify-center shrink-0">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="flex flex-col leading-tight overflow-hidden" x-show="!sidebarCollapsed" x-transition>
                            <span class="text-xs font-medium text-white truncate">{{ auth()->user()->name }}</span>
                            <span class="text-[9px] uppercase tracking-wider text-saddle font-mono">{{ auth()->user()->role }}</span>
                        </div>
                    </div>

                    <form action="{{ route('admin.logout') }}" method="POST" x-show="!sidebarCollapsed" x-transition>
                        @csrf
                        <button type="submit" 
                                title="Sign out"
                                class="p-1.5 text-gray-400 hover:text-red-400 hover:bg-white/5 rounded transition-colors focus-visible:ring-2 focus-visible:ring-saddle"
                                aria-label="Sign out">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </aside>

        <!-- MAIN CONTENT AREA -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-[#FAF8F5]">
            
            <!-- TOP APP BAR -->
            <header class="h-16 bg-white border-b border-paper-border flex items-center justify-between px-4 sm:px-6 z-20 shrink-0">
                <div class="flex items-center gap-3">
                    <!-- Mobile Hamburger -->
                    <button type="button" 
                            @click="sidebarOpen = true"
                            class="p-2 -ml-2 text-ink-muted hover:text-ink lg:hidden focus-visible:ring-2 focus-visible:ring-saddle rounded"
                            aria-label="Open sidebar menu">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Desktop Collapse Toggle -->
                    <button type="button" 
                            @click="toggleSidebar()"
                            class="hidden lg:flex p-1.5 text-ink-muted hover:text-ink hover:bg-paper-muted rounded transition-colors focus-visible:ring-2 focus-visible:ring-saddle"
                            :title="sidebarCollapsed ? 'Expand sidebar' : 'Collapse sidebar'"
                            aria-label="Toggle sidebar width">
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': sidebarCollapsed }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                        </svg>
                    </button>

                    <!-- Breadcrumbs & Section Title -->
                    <div class="flex items-center gap-2 text-xs font-mono">
                        <a href="{{ route('admin.dashboard') }}" class="text-ink-muted hover:text-saddle transition-colors">OS</a>
                        <span class="text-ink-subtle">/</span>
                        <span class="text-ink font-semibold uppercase tracking-wider truncate">@yield('page_title', 'Ledger')</span>
                    </div>
                </div>

                <!-- Right Actions Bar -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" 
                       class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded border border-paper-border text-xs font-mono text-ink-muted hover:text-ink hover:border-ink transition-colors focus-visible:ring-2 focus-visible:ring-saddle">
                        <span>Storefront</span>
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>

                    <!-- Status Indicator -->
                    <div class="hidden md:flex items-center gap-2 px-2.5 py-1 bg-emerald-50 text-emerald-800 border border-emerald-200 rounded text-[11px] font-mono">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 animate-pulse"></span>
                        <span>PRODUCTION READY</span>
                    </div>

                    <!-- User Quick Menu -->
                    <div class="flex items-center gap-2 pl-2 border-l border-paper-border">
                        <a href="{{ route('admin.profile.edit') }}" 
                           class="flex items-center gap-2 p-1 rounded hover:bg-paper-muted transition-colors focus-visible:ring-2 focus-visible:ring-saddle"
                           title="Administrator Profile">
                            <div class="w-8 h-8 rounded-full bg-atelier-dark text-white text-xs font-semibold flex items-center justify-center border border-paper-border">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <span class="text-xs font-medium text-ink hidden xl:inline">{{ auth()->user()->name }}</span>
                        </a>
                    </div>
                </div>
            </header>

            <!-- FLASH ALERTS NOTIFICATION (Polite aria-live) -->
            <div class="px-4 sm:px-6 pt-4" aria-live="polite">
                @if(session('success'))
                    <div class="p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-md flex items-start gap-3 shadow-xs" role="alert">
                        <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-xs font-medium flex-1">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="p-3.5 bg-red-50 border border-red-200 text-red-900 rounded-md flex items-start gap-3 shadow-xs" role="alert">
                        <svg class="w-5 h-5 text-red-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-xs font-medium flex-1">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @if(isset($errors) && $errors->any())
                    <div class="p-3.5 bg-amber-50 border border-amber-200 text-amber-900 rounded-md flex items-start gap-3 shadow-xs" role="alert">
                        <svg class="w-5 h-5 text-amber-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <div class="text-xs flex-1">
                            <span class="font-semibold block mb-1">Please review the form errors:</span>
                            <ul class="list-disc list-inside space-y-0.5">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>

            <!-- SCROLLABLE PAGE BODY -->
            <main id="admin-main" class="flex-1 overflow-y-auto px-4 sm:px-6 py-6 scroll-smooth">
                @yield('content')
            </main>

        </div>

    </div>

    @stack('scripts')
</body>
</html>
