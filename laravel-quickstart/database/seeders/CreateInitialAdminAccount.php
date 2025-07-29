<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateInitialAdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::unguard(); // Bỏ bảo vệ để vô hiệu hóa tính năng "mass assignment protection" tạm thời cho tất cả các model Eloquent.
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => 'password',
            'is_admin' => true,
            'username' => 'admin_user',
        ]);
    }
}
