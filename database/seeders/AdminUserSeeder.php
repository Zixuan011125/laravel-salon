<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Support\Facades\DB; // Ensure this import is included

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('admin')->insert([
        //     'name' => 'admin',
        //     'password' => 'Zixuan@1125',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        $admin=new Admin();
        $admin->name='admin';
        $admin->password='Zixuan@1125';
        $admin->save();
    }
}
