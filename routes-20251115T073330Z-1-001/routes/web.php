<?php
use App\Http\Controllers\LabdarugoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KapcsolatController;
use App\Http\Controllers\UzenetController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\KlubController;

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
});

Route::middleware(['auth'])->group(function () {

    
    Route::get('/uzenetek', [UzenetController::class, 'index'])->name('uzenetek.index');

   
    Route::get('/uzenetek/uj', [UzenetController::class, 'create'])->name('uzenetek.create');

    
    Route::post('/uzenetek', [UzenetController::class, 'store'])->name('uzenetek.store');

    
    Route::get('/uzenetek/kuldottek', [UzenetController::class, 'sent'])->name('uzenetek.sent');

  
    Route::get('/uzenetek/{id}', [UzenetController::class, 'show'])->name('uzenetek.show');

   
    Route::delete('/uzenetek/{id}', [UzenetController::class, 'destroy'])->name('uzenetek.destroy');
});

require __DIR__.'/auth.php';
Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'admin'])->name('admin.index');

Route::get('/labdarugok', [LabdarugoController::class, 'index'])->name('labdarugok.index');

Route::get('/kapcsolat', [KapcsolatController::class, 'index'])->name('kapcsolat.index');


Route::post('/kapcsolat', [KapcsolatController::class, 'store'])->name('kapcsolat.store');

Route::get('/diagram', [DiagramController::class, 'index'])->name('diagram.index');
Route::middleware(['auth', 'admin'])->group(function () {

  
    Route::resource('klubok', KlubController::class)->parameter('klubok', 'klub');

   
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});