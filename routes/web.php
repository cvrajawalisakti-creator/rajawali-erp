<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterProcessController;
use App\Http\Controllers\BomController;
use App\Http\Controllers\WorkOrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/company', [CompanyController::class, 'edit'])
        ->name('company.edit');

    Route::put('/company', [CompanyController::class, 'update'])
        ->name('company.update');

    Route::resource('customers', CustomerController::class);     

    Route::resource('suppliers', SupplierController::class);

    Route::resource('items', ItemController::class);

    Route::resource('master-processes', MasterProcessController::class);

    Route::post(
        'boms/{id}/revision',
        [BomController::class, 'storeRevision']
    )->name('boms.revision.store');

    Route::resource('boms', BomController::class);

    Route::resource('work-orders', WorkOrderController::class);
    
    Route::patch(
        '/work-orders/{workOrder}/release',
        [WorkOrderController::class, 'release']
    )->name('work-orders.release');

    });

    Route::patch(
        '/work-orders/{workOrder}/start',
        [WorkOrderController::class, 'start']
    )->name('work-orders.start');

require __DIR__.'/auth.php';
