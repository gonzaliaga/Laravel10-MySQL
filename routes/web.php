<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Chirp;

Route::view('/', 'welcome')->name('welcome');





Route::middleware('auth')->group(function () {
    Route::view('/dashboard','dashboard')->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/chirps', function () {
        return view('chirps.index');
    })->name('chirps.index');
    Route::post('/chirps', function () {
        // insert into database
        Chirp::create([
            'user_id' => auth()->id(),
            'message' => request('message'),
        ]);
        // se puede resumir esta linea session()->flash('status', 'Chirp created!');
        return to_route('chirps.index')->with('status', __('Chirp created successfully!')); // poniedola aca, se puede usar en cualquier vista
    });
});

require __DIR__.'/auth.php';
