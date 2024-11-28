<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-gray-100/50">
    <nav class="p-4 w-full bg-white shadow-md">
        <div class=" max-w-7xl mx-auto flex items-center justify-between gap-4">
            <div>
                @include('logo')
            </div>
            <ul>
                <li>
                    <a href="{{ route('login') }}"
                        class="bg-violet-500 text-white py-2 px-6 rounded-full shadow-md hover:bg-violet-700 transition-all ease-in-out duration-300 hover:shadow-none ">
                        Sign in
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="h-[400px] grid grid-cols-2 items-center gap-4 mb-16">
        <div class=" max-w-7xl mx-auto text-start space-y-6 px-4 ">
            <!-- Brand Title -->
            <h1 class="text-6xl font-bold text-gray-700">
                KEY<span class="text-violet-500">VAULT</span>
            </h1>
            <!-- Tagline -->
            <p class="text-gray-700 text-xl max-w-lg mx-auto">
                With KeyVault, you can store all your passwords in one place. Make your life easier and more secure.
            </p>

            <!-- CTA -->
            <div class="flex gap-2 relative" x-data="{ open: false }">
                <button
                    class="bg-violet-500 text-white py-4 px-8 rounded-full shadow-md hover:bg-violet-700 transition-all ease-in-out duration-300 hover:shadow-none text-xl ">
                    Get Started
                </button>
                <button
                    class=" text-gray-700 border-violet-500 border py-4 px-8 rounded-full shadow-md hover:bg-violet-100 transition-all ease-in-out duration-300 hover:shadow-none text-xl "
                    @click="open = !open">
                    Try for Free
                </button>

                <div x-show="open" x-transition
                    class="bg-white p-6 rounded-lg shadow-md absolute  -end-64
                    top-1/2  transform -translate-y-1/2 w-[400px] z-50
                ">
                    <div x-ignore>
                        @livewire('password-generator')
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <img src="{{ asset('assets/illustrations/banner-protection.png') }}" alt="KeyVault Logo" class=" mx-auto"
                width="600">
        </div>
    </div>

    @php
        $features = [
            [
                'title' => 'Advanced Security',
                'description' =>
                    'Experience peace of mind with cutting-edge encryption and robust security protocols, ensuring your data remains private, impenetrable, and exclusively yours.',
            ],
            [
                'title' => 'Effortless Usability',
                'description' =>
                    'Navigate with ease! Our user-friendly interface is designed to help you securely manage your passwords in just a few clicks, saving you time and effort.',
            ],
            [
                'title' => 'Seamless Accessibility',
                'description' =>
                    'Your passwords, anytime, anywhere. Whether on your phone, tablet, or desktop, KeyVault keeps your data synchronized and ready across all your devices.',
            ],
        ];
    @endphp


    <div class="text-gray-700">
        <div class="py-12 max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-center">
                Our Features
            </h1>
        </div>

        <div class="grid grid-cols-3 gap-4 max-w-7xl mx-auto">
            @foreach ($features as $key => $feature)
                <div @class([
                    'p-8 ' => true,
                    'border-x-2' => $key === 1,
                ])>
                    <h2 class="text-xl font-bold text-violet-500">{{ $feature['title'] }}</h2>
                    <p class="mt-4">{{ $feature['description'] }}</p>
                </div>
            @endforeach
        </div>

    </div>

</body>

</html>
