<div x-data="{ password: @entangle('generatedPassword') }" class="space-y-4">
    <!-- Title -->
    <h1 class="text-lg font-bold">
        Try It Demo
    </h1>
    <!-- Description -->
    <p class="text-sm text-gray-500">
        You can generate a random password by clicking the
        "Generate Password" button below. The password will be displayed in the input field below, and you can copy it
        to your clipboard.
    </p>
    <!-- Generate Password Button -->
    <form class="flex w-full gap-4 " wire:submit.prevent='generate'>
        <button
            class=" flex-grow-1 bg-violet-500 w-full text-white rounded-lg hover:bg-violet-700 transition-all ease-in-out duration-300 py-2
            disabled:opacity-50 disabled:cursor-not-allowed disabled:bg-violet-500 disabled:text-white disabled:shadow-none"
            wire:loading.attr='disabled' wire:target='generate'>
            <span wire:loading.remove wire:target='generate'>Generate Password</span>
            <span wire:loading wire:target='generate'>Generating...</span>
        </button>
        <input type="text" wire:model='length' class="  border border-gray-500 rounded-lg text-center ">
    </form>

    @error('length')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    @if (session('error::generate'))
        <p class="text-red-500 text-sm">{{ session('error::generate') }}</p>
    @else
        <div class="space-y-2 ">
            <p class="text-gray-700 text-wrap text-sm text-center"
                x-text="password || 'Your generated password will appear here'">
            </p>
            <button x-show="password" @click="navigator.clipboard.writeText(password)"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm rounded-lg px-4 py-2 transition-all duration-300 mx-auto block">
                Copy Password
            </button>
        </div>
    @endif



    <!-- Display and Copy Password -->

</div>
