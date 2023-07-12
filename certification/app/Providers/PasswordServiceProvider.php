<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Password;
use App\Rules\Password as PasswordRule;

class PasswordServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(Password::class, function () {
            $rule = Password::min(8);
    
            return $this->app->isProduction()
                ? $rule->letters()->mixedCase()->numbers()->symbols()->uncompromised()
                : $rule;
        });
    }
}
