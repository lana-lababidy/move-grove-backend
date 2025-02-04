<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;

// class AuthServiceProvider extends ServiceProvider
// {
//     /**
//      * The model to policy mappings for the application.
//      *
//      * @var array
//      */
//     protected $policies = [
//         // 'App\Models\Model' => 'App\Policies\ModelPolicy',
//     ];

//     /**
//      * Register any application services.
//      *
//      * @return void
//      */
//     public function boot(): void
//     {
//         $this->registerPolicies();

//         Passport::enableImplicitGrant();
//      }
// }
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();


    Passport::tokensCan([
        'user' => 'Access general user resources',
        'admin' => 'Access admin resources',
    ]);
        // لا حاجة لاستدعاء Passport::routes() في Laravel Passport 11.x

        // تحديد وقت انتهاء صلاحية التوكنات
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}



