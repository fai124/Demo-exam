<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('login', 'Conf2027')->first();

        if (!$admin) {
            $admin = new User();
            $admin->name = 'Администратор';
            $admin->login = 'Conf2027';
            $admin->password = Hash::make('Demo77');
            $admin->FIO = 'Администратор портала';
            $admin->number = '8(000)000-00-00';
            $admin->email = 'admin@conference.ru';
            $admin->save();
        }
    }
}
