<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use App\Nova\Permission;
use App\Nova\Role;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes(default: true)
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
           
            
            new \Sereny\NovaPermissions\NovaPermissions()

       ];
        
        // return [
        //     // ...
        //     \Sereny\NovaPermissions\NovaPermissions::make()
        //         ->roleResource(Role::class)
        //         ->permissionResource(Permission::class)
        //         ->disablePermissions()
        //         ->disableMenu()
        //         // ->hideFieldsFromRole([
        //         //     'id',
        //         //     'guard_name'
        //         // ])
        //         // ->hideFieldsFromPermission([
        //         //     'id',
        //         //     'guard_name',
        //         //     'users',
        //         //     'roles'
        //         // ])
        //         ->resolveGuardsUsing(function($request) {
        //             return [ 'web' ,'api'];
        //         })
        //         ->resolveModelForGuardUsing(function($request) {
        //             /** @var App\Auth\CustomGuard $guard */
        //             $guard = auth()->guard();
        //             return $guard->getProvider()->getModel();
        //         })
        // ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
