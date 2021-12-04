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

Route::get('/reset', [App\Http\Controllers\AuthController::class, 'reset'])->name('auth.reset');
Route::post('/forgot', [App\Http\Controllers\AuthController::class, 'forgot'])->name('auth.forgot');

Route::get('/password/{email}/{token}', [App\Http\Controllers\AuthController::class, 'password'])->name('auth.password');
Route::post('/renew', [App\Http\Controllers\AuthController::class, 'renew'])->name('auth.renew');

//Group untuk admin
Route::group(['middleware' => 'auth:admin'], function (){
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

        //RoutePengguna
        Route::get('/pengguna', [App\Http\Controllers\Admin\PenggunaController::class, 'index'])->name('admin.pengguna.index');
        Route::post('/pengguna/store', [App\Http\Controllers\Admin\PenggunaController::class, 'store'])->name('admin.pengguna.store');

        Route::get('/pengguna/cetak', [App\Http\Controllers\Admin\PenggunaController::class, 'cetak'])->name('admin.pengguna.cetak');

        //RouteSuplier
        Route::get('/suplier', [App\Http\Controllers\admin\SuplierController::class, 'index'])->name('admin.suplier.index');
        Route::get('/suplier/add', [App\Http\Controllers\admin\SuplierController::class, 'add'])->name('admin.suplier.add');
        Route::post('/suplier/store', [App\Http\Controllers\admin\SuplierController::class, 'store'])->name('admin.suplier.store');

        Route::get('/suplier/edit/{id}', [App\Http\Controllers\Admin\SuplierController::class, 'edit'])->name('admin.suplier.edit');
        Route::post('/suplier/update/{id}', [App\Http\Controllers\Admin\SuplierController::class, 'update'])->name('admin.suplier.update');

        Route::get('/suplier/delete/{id}', [App\Http\Controllers\Admin\SuplierController::class, 'delete'])->name('admin.suplier.delete');

        Route::get('/suplier/cetak', [App\Http\Controllers\Admin\SuplierController::class, 'cetak'])->name('admin.suplier.cetak');

        //RouteBarangMasuk
        Route::get('/barang_masuk', [App\Http\Controllers\Admin\BarangMasukController::class, 'index'])->name('admin.barang_masuk.index');
        Route::get('/barang_masuk/add', [App\Http\Controllers\Admin\BarangMasukController::class, 'add'])->name('admin.barang_masuk.add');
        Route::post('/barang_masuk/store', [App\Http\Controllers\Admin\BarangMasukController::class, 'store'])->name('admin.barang_masuk.store');

        Route::get('/barang_masuk/edit/{id}', [App\Http\Controllers\Admin\BarangMasukController::class, 'edit'])->name('admin.barang_masuk.edit');
        Route::post('/barang_masuk/update/{id}', [App\Http\Controllers\Admin\BarangMasukController::class, 'update'])->name('admin.barang_masuk.update');

        Route::get('/barang_masuk/delete/{id}', [App\Http\Controllers\Admin\BarangMasukController::class, 'delete'])->name('admin.barang_masuk.delete');

        route::get('/barang_masuk/cetak', [App\Http\Controllers\Admin\BarangMasukController::class, 'cetak'])->name('admin.barang_masuk.cetak');

        //Costomer
        Route::get('/costomer', [App\Http\Controllers\Admin\CostomerController::class, 'index'])->name('admin.costomer.index');
        Route::get('/costomer/add', [App\Http\Controllers\Admin\CostomerController::class, 'add'])->name('admin.costomer.add');
        Route::post('/costomer/store', [App\Http\Controllers\Admin\CostomerController::class, 'store'])->name('admin.costomer.store');

        Route::get('/costomer/edit/{id}', [App\Http\Controllers\Admin\CostomerController::class, 'edit'])->name('admin.costomer.edit');
        Route::post('/costomer/update/{id}', [App\Http\Controllers\Admin\CostomerController::class, 'update'])->name('admin.costomer.update');

        Route::get('/costomer/delete/{id}', [App\Http\Controllers\Admin\CostomerController::class, 'delete'])->name('admin.costomer.delete');

        Route::get('/costomer/cetak', [App\Http\Controllers\Admin\CostomerController::class, 'cetak'])->name('admin.costomer.cetak');

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

        Route::get('/pengguna/cetak', [App\Http\Controllers\SuperAdmin\PenggunaController::class, 'cetak'])->name('superadmin.pengguna.cetak');

        //RouteSuplier
        Route::get('/suplier', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'index'])->name('superadmin.suplier.index');
        Route::get('/suplier/add', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'add'])->name('superadmin.suplier.add');
        Route::post('/suplier/store', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'store'])->name('superadmin.suplier.store');

        Route::get('/suplier/edit/{id}', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'edit'])->name('superadmin.suplier.edit');
        Route::post('/suplier/update/{id}', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'update'])->name('superadmin.suplier.update');

        Route::get('/suplier/delete/{id}', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'delete'])->name('superadmin.suplier.delete');

        Route::get('/suplier/cetak', [App\Http\Controllers\SuperAdmin\SuplierController::class, 'cetak'])->name('superadmin.suplier.cetak');

        //RouteBarangMasuk
        Route::get('/barang_masuk', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'index'])->name('superadmin.barang_masuk.index');
        Route::get('/barang_masuk/add', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'add'])->name('superadmin.barang_masuk.add');
        Route::post('/barang_masuk/store', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'store'])->name('superadmin.barang_masuk.store');

        Route::get('/barang_masuk/edit/{id}', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'edit'])->name('superadmin.barang_masuk.edit');
        Route::post('/barang_masuk/update/{id}', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'update'])->name('superadmin.barang_masuk.update');

        Route::get('/barang_masuk/delete/{id}', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'delete'])->name('superadmin.barang_masuk.delete');

        route::get('/barang_masuk/cetak', [App\Http\Controllers\SuperAdmin\BarangMasukController::class, 'cetak'])->name('superadmin.barang_masuk.cetak');
        //Costomer
        Route::get('/costomer', [App\Http\Controllers\SuperAdmin\CostomerController::class, 'index'])->name('superadmin.costomer.index');
        Route::get('/costomer/add', [App\Http\Controllers\SuperAdmin\CostomerController::class, 'add'])->name('superadmin.costomer.add');
        Route::post('/costomer/store', [App\Http\Controllers\SuperAdmin\CostomerController::class, 'store'])->name('superadmin.costomer.store');

        Route::get('/costomer/edit/{id}', [App\Http\Controllers\SuperAdmin\CostomerController::class, 'edit'])->name('superadmin.costomer.edit');
        Route::post('/costomer/update/{id}', [App\Http\Controllers\SuperAdmin\CostomerController::class, 'update'])->name('superadmin.costomer.update');

        Route::get('/costomer/delete/{id}', [App\Http\Controllers\SuperAdmin\CostomerController::class, 'delete'])->name('superadmin.costomer.delete');

        Route::get('/costomer/cetak', [App\Http\Controllers\SuperAdmin\CostomerController::class, 'cetak'])->name('superadmin.costomer.cetak');

        //Transaksi
        Route::get('/transaction', [App\Http\Controllers\SuperAdmin\TransactionController::class, 'index'])->name('admin.transaksi.index');
        Route::get('/transaction/add', [App\Http\Controllers\SuperAdmin\TransactionController::class, 'add'])->name('superadmin.transaksi.add');
        Route::post('/transaction/store', [App\Http\Controllers\SuperAdmin\TransactionController::class, 'store'])->name('superadmin.transaksi.store');

        Route::get('/transaction/detail/{id}', [App\Http\Controllers\SuperAdmin\TransactionController::class, 'detail'])->name('superadmin.transaksi.detail');
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
