<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;


class PasswordGenerator extends Component
{
    public $generatedPassword;

    public $length = 12;

    public function render()
    {
        return view('livewire.password-generator');
    }

    public function generate()
    {



        $this->validate([
            'length' => ['required', 'integer', 'min:8', 'max:64'],
        ], [
            'length.required' => 'The password length is required.',
            'length.integer' => 'The password length must be an integer.',
            'length.min' => 'The password length must be at least 4 characters.',
            'length.max' => 'The password length must be at most 64 characters.',
        ]);

        $ip = request()->ip();

        // Define the request limit for non-logged-in users
        $limit = 3;
        $cacheKey = "password_generation_attempts:{$ip}";
        $attempts = cache()->get($cacheKey, 0);

        // Check if the limit has been reached for non-logged-in users
        if (!auth()->check() && $attempts >= $limit) {
            return session()->flash('error::generate', 'You have reached the maximum number of password generation requests. Please log in for unlimited access.');
        }

        // Increment the counter in the cache with a TTL of 1 hour
        cache()->put($cacheKey, $attempts + 1, now()->addHour());

        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $specialCharacters = '!@#$%^&*()-_=+[]{}<>?';
        $allCharacters = $lowercase . $uppercase . $numbers . $specialCharacters;

        // Ensure the password contains at least one character of each type
        $password = $lowercase[random_int(0, strlen($lowercase) - 1)] .
                    $uppercase[random_int(0, strlen($uppercase) - 1)] .
                    $numbers[random_int(0, strlen($numbers) - 1)] .
                    $specialCharacters[random_int(0, strlen($specialCharacters) - 1)];

        // Fill the rest of the password length with random characters
        for ($i = 4; $i < $this->length; $i++) {
            $password .= $allCharacters[random_int(0, strlen($allCharacters) - 1)];
        }

        // Shuffle the final password to ensure randomness
        $this->generatedPassword = str_shuffle($password);
    }

}
