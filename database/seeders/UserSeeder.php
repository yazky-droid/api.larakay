<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
            'name' => 'Yazky Maulana Fajar',
            'email' => 'yazkymaulana@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            ],
            [
            'name' => 'Fajar Aji',
            'email' => 'fajaraj@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            ],
            [
            'name' => 'Saputra',
            'email' => 'saputra@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            ],
        ])->each(function ($user) {
            \App\Models\User::create($user);
        });

        collect(['admin','moderator'])->each(fn($role) => \App\Models\Role::create(['name' => $role])); //di php 7.4 bisa gini

        User::find(1)->roles()->attach([1]);
        User::find(2)->roles()->attach([2]);
    }
}
