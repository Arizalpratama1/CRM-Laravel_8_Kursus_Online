<?php

namespace App\Providers;
use App\Models\User;
use App\Models\RoleAkses;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Bypass Super Admin
        Gate::before(function ($user, $ability) {
            if ($user->id == 1) {
                return true;
            }
        });

        Gate::define('index-roleakses', function() {
            if(RoleAkses::where(['nama_controller' => 'RoleAksesController' , 'user_id' => auth()->id()])->where('can_index', 1)->first() != null)
                return true;
        });

        //======================Start kategori Controller===============
        Gate::define('index-kategori', function() {
            if(RoleAkses::where(['nama_controller' => 'KategoriController' , 'user_id' => auth()->id()])->where('can_index', 1)->first() != null)
                return true;
        });
        Gate::define('create-kategori', function() {
            if(RoleAkses::where(['nama_controller' => 'KategoriController' , 'user_id' => auth()->id()])->where('can_create', 1)->first() != null)
                return true;
        });
        Gate::define('read-kategori', function() {
            if(RoleAkses::where(['nama_controller' => 'KategoriController' , 'user_id' => auth()->id()])->where('can_read', 1)->first() != null)
                return true;
        });
        Gate::define('edit-kategori', function() {
            if(RoleAkses::where(['nama_controller' => 'KategoriController' , 'user_id' => auth()->id()])->where('can_edit', 1)->first() != null)
                return true;
        });
        Gate::define('delete-kategori', function() {
            if(RoleAkses::where(['nama_controller' => 'KategoriController' , 'user_id' => auth()->id()])->where('can_delete', 1)->first() != null)
                return true;
        });
        //======================End kategori Controller==================

        //======================Start tentor Controller===============
        Gate::define('index-tentor', function() {
            if(RoleAkses::where(['nama_controller' => 'TentorController' , 'user_id' => auth()->id()])->where('can_index', 1)->first() != null)
                return true;
        });
        Gate::define('create-tentor', function() {
            if(RoleAkses::where(['nama_controller' => 'TentorController' , 'user_id' => auth()->id()])->where('can_create', 1)->first() != null)
                return true;
        });
        Gate::define('read-tentor', function() {
            if(RoleAkses::where(['nama_controller' => 'TentorController' , 'user_id' => auth()->id()])->where('can_read', 1)->first() != null)
                return true;
        });
        Gate::define('edit-tentor', function() {
            if(RoleAkses::where(['nama_controller' => 'TentorController' , 'user_id' => auth()->id()])->where('can_edit', 1)->first() != null)
                return true;
        });
        Gate::define('delete-tentor', function() {
            if(RoleAkses::where(['nama_controller' => 'TentorController' , 'user_id' => auth()->id()])->where('can_delete', 1)->first() != null)
                return true;
        });
        //======================End tentor Controller==================

        //======================Start kelas Controller===============
        Gate::define('index-kelas', function() {
            if(RoleAkses::where(['nama_controller' => 'KelasController' , 'user_id' => auth()->id()])->where('can_index', 1)->first() != null)
                return true;
        });
        Gate::define('create-kelas', function() {
            if(RoleAkses::where(['nama_controller' => 'KelasController' , 'user_id' => auth()->id()])->where('can_create', 1)->first() != null)
                return true;
        });
        Gate::define('read-kelas', function() {
            if(RoleAkses::where(['nama_controller' => 'KelasController' , 'user_id' => auth()->id()])->where('can_read', 1)->first() != null)
                return true;
        });
        Gate::define('edit-kelas', function() {
            if(RoleAkses::where(['nama_controller' => 'KelasController' , 'user_id' => auth()->id()])->where('can_edit', 1)->first() != null)
                return true;
        });
        Gate::define('delete-kelas', function() {
            if(RoleAkses::where(['nama_controller' => 'KelasController' , 'user_id' => auth()->id()])->where('can_delete', 1)->first() != null)
                return true;
        });
        //======================End kelas Controller==================

        //======================Start pembayaran Controller===============
        Gate::define('index-pembayaran', function() {
            if(RoleAkses::where(['nama_controller' => 'PembayaranController' , 'user_id' => auth()->id()])->where('can_index', 1)->first() != null)
                return true;
        });
        //======================End pembayaran Controller==================
    }
}
