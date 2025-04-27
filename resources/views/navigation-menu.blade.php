<div x-data="{ open: false }" class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="block h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex sm:ml-10 sm:items-center">
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        Dashboard
                    </a>
                    
                    <a href="/gallery" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('gallery*') ? 'bg-gray-100 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        Image
                    </a>
                    
                    <a href="/blog" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('blog*') ? 'bg-gray-100 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        Berita
                    </a>
                    
                    <a href="/blog" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('users*') ? 'bg-gray-100 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        Manage Users
                    </a>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <div class="relative" x-data="{ open: false }">
                    <div>
                        <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                            <span class="ml-2">{{ Auth::user()->name }}</span>
                            <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <div 
                        x-show="open" 
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-100" 
                        x-transition:enter-start="transform opacity-0 scale-95" 
                        x-transition:enter-end="transform opacity-100 scale-100" 
                        x-transition:leave="transition ease-in duration-75" 
                        x-transition:leave-start="transform opacity-100 scale-100" 
                        x-transition:leave-end="transform opacity-0 scale-95" 
                        class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        style="display: none;"
                    >
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            Manage Account
                        </div>
                        
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Profile
                        </a>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': !open}" class="sm:hidden hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('dashboard') ? 'border-indigo-500 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium">
                Dashboard
            </a>
            
            <a href="{{ route('image.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('image*') ? 'border-indigo-500 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium">
                Image
            </a>
            
            <a href="{{ route('blog.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('blog*') ? 'border-indigo-500 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium">
                Berita
            </a>
            
            <a href="{{ route('users.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('users*') ? 'border-indigo-500 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }} text-base font-medium">
                Manage Users
            </a>
        </div>
        
        <!-- Mobile user menu -->
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            
            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                    Profile
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>