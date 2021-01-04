<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        config([
			'laravellocalization.supportedLocales' => [
                'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
                'ar' => ['name' => 'Croatian', 'script' => 'Latn', 'native' => 'العربية', 'regional' => 'hr_HR'],
			],
			'laravellocalization.hideDefaultLocaleInURL' => true,
            'laravellocalization.useAcceptLanguageHeader' => true,
            'translatable.locales' => [
                'en',
                'ar'
            ],
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
