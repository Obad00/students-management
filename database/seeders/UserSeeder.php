<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Créer un utilisateur admin
        User::create([
            'nom' => 'Dabo',
            'prenom' => 'Adama',
            'email' => 'adama@gmail.com',
            'password' => Hash::make('password'), // Utilisez un mot de passe sécurisé
        ]);
    }
}
