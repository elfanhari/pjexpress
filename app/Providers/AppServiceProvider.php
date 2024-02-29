<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Format Rupiah
        Blade::directive('formatRp', function ($expression) {
          return "<?php echo 'Rp. ' . number_format($expression, 0, ',', '.'); ?>";
      });

      Gate::define('admindanstaff', function(User $user) {
        return $user->role === 'admin' ||  $user->role === 'staff';
      });

      Gate::define('pimpinan', function(User $user) {
        return $user->role === 'pimpinan';
      });

      Gate::define('admin', function(User $user) {
        return $user->role === 'admin';
      });

      Gate::define('staff', function(User $user) {
        return $user->role === 'staff';
      });

      Gate::define('supir', function(User $user) {
        return $user->role === 'supir';
      });

    }
}
