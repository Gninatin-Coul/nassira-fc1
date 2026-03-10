<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$email = 'admin@nassirafc.com';
$password = 'admin2026';

if (User::where('email', $email)->exists()) {
    echo "L'utilisateur $email existe déjà.\n";
} else {
    User::create([
        'name' => 'Administrateur',
        'email' => $email,
        'password' => Hash::make($password),
    ]);
    echo "Compte administrateur créé avec succès.\n";
    echo "Email : $email\n";
    echo "Mot de passe : $password\n";
}
