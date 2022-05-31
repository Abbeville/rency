<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Blade;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Model::unguard();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('can', function ($permission, $user) {
            $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
            return in_array($permission, $userPermissions);
        });

        Blade::if('role', function ($role) {
            $user = auth()->user();
            return $user->hasRole($role);
        });

        Blade::directive('mon', function ($money) {
            return "<?php echo '₦ ' . number_format($money, 2); ?>";
        });

        View::share([
            'categories' => Category::all(),
            'products' => Product::all(),
            'service' => Service::all()
        ]);
    }
}
