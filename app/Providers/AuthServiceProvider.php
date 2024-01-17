<?php

namespace App\Providers;

use App\Policies\ProjectPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Project;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Project::class=>ProjectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isManager', function ($user){
            return $user->user_level == 0;
        });
        Gate::define('isLeadDeveloper', function ($user){
            return $user->user_level == 1;
        });
        Gate::define('isDeveloper', function ($user){
            return $user->user_level == 2;
        });
        Gate::define('isBuUnit', function ($user){
            return $user->user_level == 3;
        });
        Gate::define('isManagerOrBuUnit', function ($user) {
            return in_array($user->user_level, [0,3]);
        });
    }
}
