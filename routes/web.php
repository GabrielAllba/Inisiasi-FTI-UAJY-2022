<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KepanitiaanController;

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



Route::get('/', [IndexController::class, 'Index'])->name('frontend.index');
Route::get('/struktur', [IndexController::class, 'Struktur'])->name('frontend.struktur');
Route::get('/panitia', [IndexController::class, 'Panitia'])->name('frontend.panitia');
Route::get('/filosofi', [IndexController::class, 'Filosofi'])->name('frontend.filosofi');
Route::get('/media', [IndexController::class, 'Media'])->name('frontend.media');
Route::get('/panitia/view/modal/{id}', [IndexController::class, 'PanitiaView']);

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'Login'])->name('admin.login');
    Route::post('/store/login', [AdminController::class, 'StoreLogin'])->name('store.admin.login');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');
    
    Route::get('/timeline', [AdminController::class, 'Timeline'])->name('admin.timeline')->middleware('admin');
    Route::post('/store/timeline', [AdminController::class, 'StoreTimeline'])->name('admin.timeline.store')->middleware('admin');
    Route::get('/edit/timeline/{id}', [AdminController::class, 'EditTimeline'])->name('admin.edit.timeline')->middleware('admin');
    Route::post('/update/timeline/{id}', [AdminController::class, 'UpdateTimeline'])->name('admin.timeline.update')->middleware('admin');
    Route::get('/delete/timeline/{id}', [AdminController::class, 'TimelineDelete'])->name('admin.delete.timeline')->middleware('admin');
    
    Route::get('/bidang', [KepanitiaanController::class, 'Bidang'])->name('admin.bidang')->middleware('admin');
    Route::get('/panitia/kelola', [KepanitiaanController::class, 'KelolaPanitia'])->name('admin.panitia')->middleware('admin');
    Route::post('/bidang/store', [KepanitiaanController::class, 'StoreBidang'])->name('admin.bidang.store')->middleware('admin');
    Route::get('/edit/bidang/{id}', [KepanitiaanController::class, 'EditBidang'])->name('admin.edit.bidang')->middleware('admin');
    Route::post('/bidang/update/{id}', [KepanitiaanController::class, 'UpdateBidang'])->name('admin.bidang.update')->middleware('admin');
    Route::get('/delete/bidang/{id}', [KepanitiaanController::class, 'DeleteBidang'])->name('admin.delete.bidang')->middleware('admin');
    
    
    // sub bidang
    Route::get('/sub_bidang', [KepanitiaanController::class, 'SubBidang'])->name('admin.sub_bidang')->middleware('admin');
    Route::post('/sub_bidang/store', [KepanitiaanController::class, 'StoreSubBidang'])->name('admin.sub_bidang.store')->middleware('admin');
    Route::get('/delete/sub_bidang/{id}', [KepanitiaanController::class, 'DeleteSubBidang'])->name('admin.delete.sub_bidang')->middleware('admin');
    Route::post('/list_panitia/store', [KepanitiaanController::class, 'StorePanitia'])->name('admin.list_panitia.store')->middleware('admin');
    
    // susunan kepanitiaan 
    Route::get('/panitia/hapus/{id}', [KepanitiaanController::class, 'PanitiaHapus'])->name('panitia.hapus')->middleware('admin');
    Route::get('/panitia/edit/{id}', [KepanitiaanController::class, 'PanitiaEdit'])->name('panitia.edit')->middleware('admin');
    
    
    // sosmed
    Route::post('/sosmed/store', [AdminController::class, 'StoreSosmed'])->name('admin.sosmed.store')->middleware('admin');
    Route::get('/delete/sosmed/{id}', [AdminController::class, 'DeleteSosmed'])->name('admin.delete.sosial_media')->middleware('admin');

});

Route::controller(UserController::class)->group(function(){
    Route::get('users', 'index')->name('admin.kelompok');
    Route::get('users-export', 'export')->name('users.export');
    Route::post('users-import', 'import')->name('users.import');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
