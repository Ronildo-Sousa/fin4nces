<nav >
    <!-- component -->
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
            <!-- Sidebar -->
            <div x-transition:enter="transform transition-transform duration-300"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition-transform duration-300" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full" x-show="isSidebarOpen"
                class="fixed inset-y-0 z-10 flex w-80 bg-gray-700">
              
                <!-- Sidebar content -->
                <div class="z-10 flex flex-col flex-1">
                    <div class="flex items-center justify-between flex-shrink-0 w-64 p-4">
                        <!-- Logo -->
                        <a href="#">
                            <img class="block h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                        </a>
                        <!-- Close btn -->
                        <button @click="isSidebarOpen = false" class="p-1 rounded-lg focus:outline-none focus:ring">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span class="sr-only">Close sidebar</span>
                        </button>
                    </div>
                    <nav class="flex flex-col flex-1 w-full mt-4">
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 p-2 w-full hover:bg-gray-800">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>Home</span>
                        </a>
                        <a href="{{ route('history') }}" class="flex items-center space-x-2 p-2 w-full hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                              </svg>                              
                            <span>History</span>
                        </a>
                    </nav>
                    <div class="flex-shrink-0 p-2 hover:bg-gray-800">
                        <a href="{{ route('logout') }}" class="flex items-center space-x-2">
                            <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center flex-1">
                <!-- Page content -->
                <button @click="isSidebarOpen = true" class="fixed p-2 text-white bg-black rounded-lg bottom-5 left-5">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span class="sr-only">Open menu</span>
                </button>   
            </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.1/alpine.js"></script> --}}
    <script>
        const setup = () => {
            return {
                isSidebarOpen: false,
            }
        }
    </script>
</nav>
