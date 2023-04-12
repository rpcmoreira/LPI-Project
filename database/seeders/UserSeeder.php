<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
        ['nome' => 'Américo Ribeiro', 'tipo_id' => 4, 'email' => 'americojcribeiro@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'email_verified_at' => now()],
        ['nome' => 'António Jácomo', 'tipo_id' => 4, 'email' => 'ajacomo@porto.ucp.pt', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'email_verified_at' => now()],
        ['nome' => 'Arnaldo Lhamas', 'tipo_id' => 4, 'email' => 'alhamas@ufp.edu.pt', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'email_verified_at' => now()],
        ['nome' => 'João Casqueira', 'tipo_id' => 4, 'email' => 'jcasq@ufp.edu.pt', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'email_verified_at' => now()],
        ['nome' => 'José Calheiros', 'tipo_id' => 2, 'email' => 'jcalheiros@ufp.edu.pt', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'email_verified_at' => now()],
        ['nome' => 'Marina Lencastre', 'tipo_id' => 3, 'email' => 'mlencast@ufp.edu.pt', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'email_verified_at' => now()],
        ['nome' => 'Teresa Brandão', 'tipo_id' => 4, 'email' => 'teresa@ufp.edu.pt', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'email_verified_at' => now()],
        ['nome' => 'Carla Sousa', 'tipo_id' => 5, 'email' => 'sec.ces.he@ufp.edu.pt', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'email_verified_at' => now()],
        ['nome' => 'Admin', 'tipo_id' => 1, 'email' => 'admin@admin.pt', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'email_verified_at' => now()]];

        foreach($users as $user){
            DB::table('users')->insert($user);
        }
    }
}
