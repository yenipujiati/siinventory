<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\AuthController::class, 'index']);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'verify'])->name('auth.verify');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

//Group untuk admin
Route::group(['middleware' => 'auth:admin'], function (){
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('admin.dashboard.index');

                //RoutePengguna
        Route::get('/pengguna', [App\Http\Controllers\Admin\PenggunaController::class, 'index'])->name('admin.pengguna.index');
        Route::post('/pengguna/store', [App\Http\Controllers\Admin\PenggunaController::class, 'store'])->name('admin.pengguna.store');
    });
});

//Group untuk superadmin
Route::group(['middleware' => 'auth:superadmin'], function (){
    Route::prefix('superadmin')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'index'])->name('superadmin.dashboard.index');

            //RoutePengguna
        Route::get('/pengguna', [App\Http\Controllers\SuperAdmin\PenggunaController::class, 'index'])->name('superadmin.pengguna.index');
        Route::get('/pengguna/add', [App\Http\Controllers\SuperAdmin\PenggunaController::class, 'add'])->name('superadmin.pengguna.add');
        Route::post('/pengguna/store', [App\Http\Controllers\SuperAdmin\PenggunaController::class, 'store'])->name('superadmin.pengguna.store');

        Route::get('/pengguna/edit/{id}', [App\Http\Controllers\SuperAdmin\PenggunaController::class, 'edit'])->name('superadmin.pengguna.edit');
        Route::post('/pengguna/update/{id}', [App\Http\Controllers\SuperAdmin\PenggunaController::class, 'update'])->name('superadmin.pengguna.update');

        Route::get('/pengguna/delete/{id}', [App\Http\Controllers\SuperAdmin\PenggunaController::class, 'delete'])->name('superadmin.pengguna.delete');

        Route::get('/pengguna/export', [App\Http\Controllers\SuperAdmin\PenggunaController::class, 'export'])->name('superadmin.pengguna.export');

        //RouteSuplier
        Route::get('/suplier', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'index'])->name('superadmin.suplier.index');
        Route::get('/suplier/add', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'add'])->name('superadmin.suplier.add');
        Route::post('/suplier/store', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'store'])->name('superadmin.suplier.store');

        Route::get('/suplier/edit/{id}', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'edit'])->name('superadmin.suplier.edit');
        Route::post('/suplier/update/{id}', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'update'])->name('superadmin.suplier.update');

        Route::get('/suplier/delete/{id}', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'delete'])->name('superadmin.suplier.delete');

        //RouteBarangMasuk
        Route::get('/barang_masuk', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'index'])->name('superadmin.barang_masuk.index');
        Route::get('/barang_masuk/add', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'add'])->name('superadmin.barang_masuk.add');
        Route::post('/barang_masuk/store', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'store'])->name('superadmin.barang_masuk.store');

        Route::get('/barang_masuk/edit/{id}', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'edit'])->name('superadmin.barang_masuk.edit');
        Route::post('/barang_masuk/update/{id}', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'update'])->name('superadmin.barang_masuk.update');

        Route::get('/barang_masuk/delete/{id}', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'delete'])->name('superadmin.barang_masuk.delete');

    });
});

Route::get('download/{filename}', function($filename) {
    $file_path = storage_path('app/public/' . $filename);
    if (file_exists($file_path)) {
        return Response::download($file_path, $filename, ['Content-Length: ' . filesize($file_path)]);
    } else {
        exit('File yang ada request tidak ditemukan di server kami!');
    }
})->where('filename', '[A-Za-z0-9\-\_\.]+')->name('download_file');


Route::get('files/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('storage_file');
