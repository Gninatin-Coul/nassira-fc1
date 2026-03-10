<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;

// --- AUTHENTIFICATION ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- FRONT-OFFICE ---
Route::get('/', function () {
    $featuredPlayers = \App\Models\Player::with('category')->inRandomOrder()->take(4)->get();
    $latestArticles = \App\Models\Article::latest()->take(3)->get();
    return view('welcome', compact('featuredPlayers', 'latestArticles'));
})->name('home');

Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');

Route::resource('articles', ArticleController::class)->only(['index', 'show']);
Route::get('/matches', [GameController::class, 'index'])->name('games.index');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::resource('projects', ProjectController::class)->only(['index', 'show']);

Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');

// --- BACK-OFFICE (ADMIN) ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $recentInscriptions = \App\Models\Registration::latest()->take(5)->get();
        $recentMessages = \App\Models\ContactMessage::latest()->take(5)->get();
        $playersCount = \App\Models\Player::count();
        $articlesCount = \App\Models\Article::count();
        $projectsCount = \App\Models\Project::count();
        $staffCount = \App\Models\Staff::count();

        return view('admin.dashboard', compact(
            'recentInscriptions', 
            'recentMessages', 
            'playersCount', 
            'articlesCount', 
            'projectsCount',
            'staffCount'
        ));
    })->name('dashboard');

    Route::resource('players', PlayerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('games', GameController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('registrations', RegistrationController::class)->only(['index', 'update', 'destroy']);
    Route::get('/messages', [ContactController::class, 'index'])->name('messages.index');
    Route::patch('/messages/{id}/read', [ContactController::class, 'read'])->name('messages.read');
    // Les autres ressources admin viendront ici...
});
