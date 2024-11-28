<div class="bg-white p-8 max-w-sm w-full rounded-[8px] shadow-md border space-y-4 text-gray-700 relative">
    <div class="bg-violet-500 rounded-full bg-opacity-20 p-8 absolute -bottom-12 -left-12"></div>
    <div class="bg-violet-500 bg-opacity-20 rounded-full p-8 absolute -top-12 -right-12"></div>
    <div>
        @include('logo')
        <p class="text-gray-500">Your Digital Guardian</p>
    </div>
    <div>
        <p class="text-sm">
            <span class="font-bold">Welcome back!</span> Please login to your account to secure your digital assets.
        </p>
    </div>
    <div>
        <form wire:submit.prevent="login">
            <div class="space-y-4">
                <div>
                    <x-label for="email">E-mail Address</x-label>
                    <x-input wire:model="email" type="email" id="email" />
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-label for="password">Password</x-label>
                    <x-input wire:model="password" type="password" id="password" />
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-button type="submit" class="w-full">Login</x-button>
                </div>
            </div>
        </form>
    </div>

    <div class="text-sm">
        <p class="text-center text-gray-500">Don't have an account? <a href="#"
                class="text-violet-500">Register</a></p>
    </div>
    <div>
        {{-- About privacy policy --}}
        <p class="text-center text-xs text-gray-500">
            By continuing, you agree to our <a href="#" class="text-violet-500">Privacy Policy</a>
        </p>
    </div>
</div>
