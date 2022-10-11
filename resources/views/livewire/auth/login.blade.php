<section class="flex items-center justify-center min-h-full px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div>
            <img class="w-auto h-12 mx-auto" src="https://tailwindui.com/img/logos/mark.svg?color=green&shade=600"
                alt="Your Company">
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-center text-white">Sign in to your account</h2>
        </div>
        <form wire:submit.prevent='login' class="mt-8 space-y-6" action="#" method="POST">
            @if (session()->has('error'))
                <div class="flex justify-center">
                    <span class="text-center text-red-400">{{ session('error') }}</span>
                </div>
            @endif
            <input type="hidden" name="remember" value="true">
            <div class="flex flex-col justify-between">
                <div class="mt-5">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input wire:model='email' id="email-address" name="email" type="email" autocomplete="email"
                        class="relative block w-full px-3 py-2 text-black placeholder-gray-500 border border-gray-300 rounded-none rounded-sm appearance-none focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Email address">
                    @error('email')
                        <span class="text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-5">
                    <label for="password" class="sr-only">Password</label>
                    <input wire:model='password' id="password" name="password" type="password"
                        autocomplete="current-password"
                        class="relative block w-full px-3 py-2 text-black placeholder-gray-500 border border-gray-300 rounded-none rounded-sm appearance-none focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Password">
                    @error('password')
                        <span class="text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit"
                    class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md group hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- Heroicon name: mini/lock-closed -->
                        <svg class="w-5 h-5 text-green-500 group-hover:text-green-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Sign in
                </button>
                <div class="flex justify-end p-1 mt-2">
                    <a href="{{ route('register') }}" class="text-white hover:text-blue-400">Create an account</a>
                </div>
            </div>
        </form>
        <div class="flex flex-col items-center">
            <p class="mb-2 text-white">Or continue with</p>
            <div class="flex items-center justify-around w-full mt-4">
                <x-auth.social-button :provider="'github'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                    </svg>
                </x-auth.social-button>
                <x-auth.social-button :provider="'google'">
                    <i class="devicon-google-plain"></i>
                </x-auth.social-button>
            </div>
        </div>
    </div>
</section>
