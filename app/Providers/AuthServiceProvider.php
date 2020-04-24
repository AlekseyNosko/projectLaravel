<?php

namespace App\Providers;

use App\Permission;
use App\PermissionRole;
use App\UserRole;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPermissionsPolicies();
    }

    public function registerPermissionsPolicies()
    {
        /*
         * Проверка на наличие разрешения у пользователя.
         */
        $permissions = Permission::all();
        foreach ($permissions as $permission){
            $permission = $permission['name'];
            Gate::define($permission, function ($user) use ($permission) {
                $user_role = UserRole::where('user_id', $user->id)->first();
                if (PermissionRole::with('getPermission')->where('role_id', $user_role['role_id'])->whereHas('getPermission',
                    function ($query) use ($permission) {
                        $query->where('name', $permission);
                    })->exists()) {
                    return true; // если в таблице permissions находиться данное разр. у польз., то true
                } else {
                    return false;
                }
            });
        }
    }
}
