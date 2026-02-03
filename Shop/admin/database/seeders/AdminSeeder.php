<?php

namespace Shop\Admin\Database\Seeders;

use Shop\Admin\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Iftekher Mahmud Pervez',
            'username' => 'iftekhermahmud1',
            'email' => 'iftekhermahmud1@gmail.com',
            'password' => Hash::make('iftekhermahmud1'),
        ]);
    }
}
