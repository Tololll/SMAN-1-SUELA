<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    nav {
        font-family: 'Inter', sans-serif;
    }

    /* Modern Gradient Background - Lebih Tipis */
    .nav-gradient {
        background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 50%, #ec4899 100%);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
    }

    /* Nav Links - Ukuran Lebih Kecil & Compact */
    .nav-link {
        position: relative;
        padding: 0.5rem 0.875rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.813rem; /* 13px */
    }

    .nav-link:hover {
        background: rgba(255, 255, 255, 0.15);
        color: white;
        transform: translateY(-1px);
    }

    .nav-link.active {
        background: rgba(255, 255, 255, 0.25);
        color: white;
        font-weight: 600;
    }

    .nav-link svg {
        width: 0.875rem; /* 14px */
        height: 0.875rem;
    }

    /* User Button - Compact */
    .user-btn {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 0.375rem 0.75rem;
        border-radius: 10px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.813rem; /* 13px */
    }

    .user-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-1px);
    }

    .user-avatar {
        width: 26px;
        height: 26px;
        border-radius: 7px;
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.75rem; /* 12px */
        color: white;
    }

    /* Auth Buttons - Compact */
    .auth-btn {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.813rem; /* 13px */
    }

    .auth-btn svg {
        width: 0.875rem;
        height: 0.875rem;
    }

    .btn-login {
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
    }

    .btn-login:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateY(-1px);
    }

    .btn-register {
        background: white;
        color: #0ea5e9;
        font-weight: 700;
    }

    .btn-register:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(255, 255, 255, 0.3);
    }

    /* Logo - Compact */
    .logo-container {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.15);
        transition: all 0.3s ease;
    }

    .logo-container:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateY(-1px);
    }

    .logo-container svg {
        width: 1.25rem; /* 20px */
        height: 1.25rem;
    }

    .logo-text {
        font-weight: 800;
        font-size: 0.938rem; /* 15px */
        color: white;
        letter-spacing: 0.5px;
    }

    /* Hamburger */
    .hamburger {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 0.375rem;
        border-radius: 8px;
        color: white;
        transition: all 0.3s ease;
    }

    .hamburger:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .hamburger svg {
        width: 1.25rem;
        height: 1.25rem;
    }

    /* Dropdown - Compact */
    .dropdown-content {
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .dropdown-link {
        padding: 0.625rem 0.875rem;
        color: #374151;
        font-weight: 500;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 0.625rem;
        font-size: 0.813rem; /* 13px */
    }

    .dropdown-link:hover {
        background: linear-gradient(135deg, rgba(14, 165, 233, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
        color: #0ea5e9;
        transform: translateX(3px);
    }

    .dropdown-link svg {
        width: 1rem;
        height: 1rem;
    }

    /* Mobile Navigation - Compact */
    .mobile-nav-link {
        padding: 0.625rem 0.875rem;
        border-radius: 8px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.9);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.625rem;
        font-size: 0.813rem; /* 13px */
    }

    .mobile-nav-link:hover,
    .mobile-nav-link.active {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        transform: translateX(3px);
    }

    .mobile-nav-link svg {
        width: 1rem;
        height: 1rem;
    }
</style>

<nav x-data="{ open: false }" class="nav-gradient sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14"> <!-- Dikurangi dari h-16 jadi h-14 -->
            <div class="flex items-center space-x-6"> <!-- Dikurangi dari space-x-8 jadi space-x-6 -->
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ route('dashboard') }}" class="logo-container">
                        <svg class="text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span class="logo-text hidden sm:block">ALUMNI</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex md:items-center md:space-x-1"> <!-- Dikurangi dari space-x-2 jadi space-x-1 -->
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>

                    @can('manage-students')
                        <a href="{{ route('admin.students.index') }}" class="nav-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                            Daftar Siswa
                        </a>
                    @endcan

                    @auth
                        <a href="{{ route('students.profile') }}" class="nav-link {{ request()->routeIs('students.profile') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Isi Profil
                        </a>
                    @else
                        <a href="#guest-form" class="nav-link">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Isi Profil
                        </a>
                    @endauth
                </div>
            </div>

            @auth
                <!-- User Menu -->
                <div class="hidden md:flex md:items-center">
                    <x-dropdown align-item="right" width="48">
                        <x-slot name="trigger">
                            <button class="user-btn">
                                <div class="user-avatar">
                                    {{ substr(Auth::user()?->name ?? 'U', 0, 1) }}
                                </div>
                                <span class="hidden lg:block">{{ Auth::user()?->name }}</span>
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="dropdown-content">
                                <div class="px-3 py-2.5 border-b border-gray-100 bg-gradient-to-r from-cyan-50 to-purple-50">
                                    <p class="text-sm font-bold text-gray-900">{{ Auth::user()?->name }}</p>
                                    <p class="text-xs text-gray-600 mt-0.5">{{ Auth::user()?->email }}</p>
                                </div>
                                
                                <div class="py-1.5">
                                    <a href="{{ (auth()->user()?->role === 'student') ? route('students.profile') : route('profile.edit') }}" class="dropdown-link">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Profile Saya
                                    </a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-link w-full text-left text-red-600 hover:bg-red-50 hover:text-red-700">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <!-- Auth Buttons -->
                <div class="hidden md:flex md:items-center md:gap-2"> <!-- Dikurangi dari gap-3 jadi gap-2 -->
                    <a href="{{ route('login') }}" class="auth-btn btn-login">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Masuk
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="auth-btn btn-register">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            Daftar
                        </a>
                    @endif
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="flex items-center md:hidden">
                <button @click="open = !open" class="hamburger">
                    <svg stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        class="md:hidden border-t border-white/20"
    >
        <div class="px-3 pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="mobile-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>

            @can('manage-students')
                <a href="{{ route('admin.students.index') }}" class="mobile-nav-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Daftar Siswa
                </a>
            @endcan

            @auth
                <a href="{{ route('students.profile') }}" class="mobile-nav-link {{ request()->routeIs('students.profile') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Isi Profil
                </a>
            @else
                <a href="#guest-form" class="mobile-nav-link">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Isi Profil
                </a>
            @endauth
        </div>

        <!-- Mobile User Section -->
        @auth
            <div class="border-t border-white/20 px-3 py-3 bg-black/10">
                <div class="flex items-center gap-2.5 mb-2.5">
                    <div class="user-avatar">
                        {{ substr(Auth::user()?->name ?? 'U', 0, 1) }}
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">{{ Auth::user()?->name }}</p>
                        <p class="text-xs text-white/80">{{ Auth::user()?->email }}</p>
                    </div>
                </div>

                <div class="space-y-1">
                    <a href="{{ (auth()->user()?->role === 'student') ? route('students.profile') : route('profile.edit') }}" class="mobile-nav-link">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Profile Saya
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="mobile-nav-link w-full text-left text-red-200 hover:text-white hover:bg-red-500/20">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="border-t border-white/20 px-3 py-3 space-y-1 bg-black/10">
                <a href="{{ route('login') }}" class="mobile-nav-link">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    Masuk
                </a>
                @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="mobile-nav-link">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Daftar
                    </a>
                @endif
            </div>
        @endauth
    </div>
</nav>