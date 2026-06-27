<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Categories
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Dompet'],
            ['id' => 2, 'name' => 'Kunci'],
            ['id' => 3, 'name' => 'HP'],
            ['id' => 5, 'name' => 'Buku'],
            ['id' => 6, 'name' => 'Cas'],
            ['id' => 9, 'name' => 'Pulpen'],
        ]);

        // 2. Seed Locations
        DB::table('locations')->insert([
            ['id' => 4, 'name' => 'Perpustakaan'],
            ['id' => 5, 'name' => 'Gazebo'],
            ['id' => 6, 'name' => 'Musholla'],
            ['id' => 7, 'name' => 'Ruang Kelas'],
            ['id' => 8, 'name' => 'WC Gedung A'],
            ['id' => 9, 'name' => 'Lab Basis Data'],
            ['id' => 10, 'name' => 'Lab UTI'],
            ['id' => 11, 'name' => 'Taman'],
            ['id' => 12, 'name' => 'Parkiran Belakang'],
        ]);

        // 3. Seed Users
        DB::table('users')->insert([
            [
                'id' => 1,
                'nim' => 'F1G124021',
                'name' => 'Yus Askia',
                'display_name' => 'im.askaa',
                'password' => '$2y$12$qFabQj87/Ls.h67ukjt6VeL4FNC4wp8uNRT0X8OlnvfVce2BwTQb6',
                'phone' => '081049518786',
                'role' => 'admin',
                'created_at' => '2025-12-12 17:00:43',
                'update_at' => '2025-12-12 17:00:43',
            ],
            [
                'id' => 2,
                'nim' => 'F1G124051',
                'name' => 'St.Rahmy',
                'display_name' => 'weartvile',
                'password' => '$2y$12$oh4ooD1XHFLZ9TnqCZUwpuQcM181tZEJOWHvhcxVdEnrYFFUFHWbq',
                'phone' => '085005061106',
                'role' => 'user',
                'created_at' => '2025-12-12 17:07:09',
                'update_at' => '2025-12-12 17:07:09',
            ],
            [
                'id' => 3,
                'nim' => 'F1G124004',
                'name' => 'AZIZA',
                'display_name' => '14.07za',
                'password' => '$2y$12$oh4ooD1XHFLZ9TnqCZUwpuQcM181tZEJOWHvhcxVdEnrYFFUFHWbq',
                'phone' => '080414170602',
                'role' => 'user',
                'created_at' => '2025-12-13 16:38:51',
                'update_at' => '2025-12-13 16:38:51',
            ],
            [
                'id' => 4,
                'nim' => 'F1G124019',
                'name' => 'Wa Rahmawati',
                'display_name' => 'serbyraa_',
                'password' => '$2y$12$oh4ooD1XHFLZ9TnqCZUwpuQcM181tZEJOWHvhcxVdEnrYFFUFHWbq',
                'phone' => '082275129009',
                'role' => 'user',
                'created_at' => '2025-12-13 16:38:51',
                'update_at' => '2025-12-13 16:38:51',
            ],
            [
                'id' => 5,
                'nim' => 'F1G124043',
                'name' => 'Nayla Safira Audrya Putri',
                'display_name' => 'sinahellla',
                'password' => '$2y$12$oh4ooD1XHFLZ9TnqCZUwpuQcM181tZEJOWHvhcxVdEnrYFFUFHWbq',
                'phone' => '081122609913',
                'role' => 'user',
                'created_at' => '2025-12-13 16:38:51',
                'update_at' => '2025-12-13 16:38:51',
            ]
        ]);

        // 4. Seed Items
        DB::table('items')->insert([
            [
                'id' => 8,
                'user_id' => 4,
                'category_id' => 3,
                'location_id' => 8,
                'title' => 'HP Samsung',
                'description' => 'Ditemukan HP samsung di WC Putri Gedung A FMIPA, bagi yang merasa kehilangan silahkan hubungi nomor di bawah',
                'image_path' => 'items/ux1icIPozQyNOL9DGRSa5lJYku6B2nNO85f4izm7.jpg',
                'status' => 'found',
                'created_at' => '2025-12-17 00:44:11',
                'updated_at' => '2025-12-17 00:44:11',
            ],
            [
                'id' => 10,
                'user_id' => 4,
                'category_id' => 2,
                'location_id' => 6,
                'title' => 'Kunci',
                'description' => 'Saya kehilangan kunci kos saya, lokasi terakhir di sekitaran mushola, bagi yang menemukannya bisa menghubungi nomor di bawah',
                'image_path' => 'items/S7RSHawi9fTA17UHUxjuTqzeyqIRUNH8R0JxCZoy.jpg',
                'status' => 'lost',
                'created_at' => '2025-12-17 01:29:43',
                'updated_at' => '2025-12-17 01:29:43',
            ],
            [
                'id' => 14,
                'user_id' => 2,
                'category_id' => 5,
                'location_id' => 5,
                'title' => 'Buku',
                'description' => 'Saya menemukan buku ini di gazebo belakang gedung A FMIPA, bagi yang merasa kehilangan mohon hubungi nomor di bawah',
                'image_path' => 'items/iEuILaLKy9JBZUl9qQRWg1cuJLL3piCopN1dWn5F.jpg',
                'status' => 'found',
                'created_at' => '2025-12-17 01:53:39',
                'updated_at' => '2025-12-17 01:53:39',
            ]
        ]);
    }
}
