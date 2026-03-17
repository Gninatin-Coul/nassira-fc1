<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

echo "--- RBAC Status ---\n";
$roles = Role::all()->pluck('name');
echo "Available Roles: " . $roles->implode(', ') . "\n";

$permissions = Permission::all()->pluck('name');
echo "Available Permissions: " . $permissions->pluck('name')->implode(', ') . "\n";

$users = User::all();
foreach ($users as $user) {
    echo "User: {$user->email}\n";
    echo "  - Roles: " . $user->getRoleNames()->implode(', ') . "\n";
    echo "  - Can 'manage users': " . ($user->can('manage users') ? 'Yes' : 'No') . "\n";
}
