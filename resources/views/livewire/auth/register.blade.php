<section class="flex items-center justify-center min-h-full px-4 py-12 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div>
            <img class="w-auto h-12 mx-auto" src="https://tailwindui.com/img/logos/mark.svg?color=green&shade=600"
                alt="Your Company">
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-center text-white">Create your account</h2>
        </div>
        <form wire:submit.prevent='save' class="mt-8 space-y-6" action="#" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="flex flex-col justify-between">
                <div>
                    <label for="name" class="sr-only">Name</label>
                    <input wire:model='name' id="name" name="name" type="text"
                        class="relative block w-full px-3 py-2 text-black placeholder-gray-500 border border-gray-300 rounded-sm appearance-none focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Name">
                    @error('name')
                        <span class="text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-5">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input wire:model='email' id="email-address" name="email" type="email" autocomplete="email"
                        class="relative block w-full px-3 py-2 text-black placeholder-gray-500 border border-gray-300 rounded-sm appearance-none focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Email address">
                    @error('email')
                        <span class="text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-5">
                    <label for="password" class="sr-only">Password</label>
                    <input wire:model='password' id="password" name="password" type="password"
                        autocomplete="current-password"
                        class="relative block w-full px-3 py-2 text-black placeholder-gray-500 border border-gray-300 rounded-sm appearance-none focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
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
                    Sign up
                </button>
                <div class="flex justify-end p-1 mt-2">
                    <a href="{{ route("login"); }}" class="text-white hover:text-blue-400">Sign in to your account</a>
                </div>
            </div>
        </form>
        <div class="flex flex-col items-center">
            <p class="mb-2 text-white">Or continue with</p>
            <div class="flex items-center">
                <button class="p-2 px-5 mx-3 bg-gray-300 rounded-md">Github</button>
            </div>
        </div>/
    </div>
</section>
