<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\Permissao;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
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
     * Define gates dynamically based on permissions from the database.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        // Define permissions dynamically from the database
        foreach ($this->getPermissoes() as $permissao) {
            Gate::define($permissao->nome, function ($user) use ($permissao) {
                return $user->existePapel($permissao->papeis)
                    || $user->existeAdmin();
            });
        }
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        // Define the default set of permissions for the application
        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }

    /**
     * Retrieve all permissions with their associated roles.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPermissoes()
    {
        return Permissao::with('papeis')->get();
    }
}
