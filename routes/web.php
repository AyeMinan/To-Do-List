<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Models\Note;
use Illuminate\Support\Facades\Route;
use Psy\Command\ListCommand;

use function Laravel\Prompts\note;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::post('/', [SubscriberController::class, 'subscribe']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/main', [NoteController::class, 'show']);

    Route::put('/main', [NoteController::class, 'storeNotes']);

    Route::get('/main', [NoteController::class, 'showNotes']);

    Route::post('/main', [NoteController::class, 'storeLists']);

    Route::put('/main/{id}/updateList', [NoteController::class, 'updateList']);

    Route::delete('/main/notes/{id}', [NoteController::class, 'destory']);

    Route::get('/main/{id}/edit', [NoteController::class, 'edit']);

    Route::put('/main/{id}/update', [NoteController::class, 'update']);

    Route::delete('/main/lists/{id}', [NoteController::class, 'deleteLists']);

    Route::get('/getNotesForList/{listId}', [NoteController::class, 'getNotesForList']);

    // Route::post('/main', [ListController::class, 'index']);

    // Route::get('/main', [ListController::class, 'index']);

    Route::post('/logout', [LogoutController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
