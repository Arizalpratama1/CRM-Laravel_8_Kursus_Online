<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    DashboardController,
    TentorController,
    KategoriController,
    FrontendController,
    KelasController,
    EventController,
    RoleAksesController,
    CallbackController
};

Route::get('/', [FrontendController::class, 'index']);

Route::post('/contact', [FrontendController::class, 'contact']);

Route::get('/kelas', [FrontendController::class, 'kelas']);

Route::get('/kelas/filter/{id}', [FrontendController::class, 'kelasFilter']);

Route::get('/event', [FrontendController::class, 'event']);

Route::get('/detailevent/{id}', [FrontendController::class, 'eventDetail']);

Route::get('/detailkelas/{id}', [FrontendController::class, 'kelasDetail']);

Route::middleware(['auth'])->group(function(){
    
    Route::get('/home', [DashboardController::class, 'index']);
    
    //backend admin
    Route::resource('/admin/tentor', TentorController::class);
    
    Route::resource('/admin/kategori', KategoriController::class);
    
    Route::resource('/admin/kelas', KelasController::class);
    
    Route::resource('/admin/event', EventController::class);
    
    Route::get('/admin/pembayaran', [KelasController::class, 'pembayaran']);

    // Role Management
    route::get('/admin/role-akses', [RoleAksesController::class, 'index']);
    
    route::get('/admin/role-akses/{id}', [RoleAksesController::class, 'show'])->whereNumber('id');
    
    route::post('/admin/role-akses/{id}', [RoleAksesController::class, 'store_update'])->whereNumber('id');

    //backend siswa
    Route::get('/siswa/list-kelas', [KelasController::class, 'listKelas']);
    
    //Route::get('/siswa/pembayaran/midtrans', [KelasController::class, 'pembayaran']);
    
    Route::get('/siswa/list-kelas/beli/{id}', [KelasController::class, 'detailListKelas']);
    
    Route::post('/siswa/list-kelas/beli/{id}', [KelasController::class, 'detailBeliListKelas']);
    
    Route::get('/siswa/pembayaran', [KelasController::class, 'beli']);
    
    Route::post('/siswa/pembayaran/{id}', [KelasController::class, 'hapusPembayaran']);

    
    Route::get('/siswa/kelas-saya', [KelasController::class, 'kelasSaya']);
    
    Route::get('/siswa/detail-kelas-saya/{id}', [KelasController::class, 'detailKelasSaya']);
    
    Route::get('/siswa/detail-kelas-saya/{id}/{video_id}', [KelasController::class, 'embedKelasSaya']);

});

Auth::routes();
