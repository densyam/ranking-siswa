<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Tambahan khusus untuk environment production (misal di Vercel)
        if (app()->environment('production')) {
            $source = database_path('ranking.sqlite');
            $destination = '/tmp/ranking.sqlite';

            // Cek kalau file belum ada di /tmp, baru disalin
            if (file_exists($source) && !file_exists($destination)) {
                copy($source, $destination);
            }
        }
    }
}
