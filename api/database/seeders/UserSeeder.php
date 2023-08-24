<?php

namespace Database\Seeders;

use App\Helpers\SeederHelper;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::create([
            'username' => 'JeanSotoriva',
            'password' => bcrypt('1234'),
            'role' => 'Administrador',
        ]);

        $userId = $user->id;
        SeederHelper::setUserId($userId);
    }
}