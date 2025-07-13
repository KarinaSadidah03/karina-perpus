<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user');
        });

        // Tambahkan 1 user admin
        DB::table('users')->insert([
            'name' => 'Admin Karina',
            'email' => 'admin@karina.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan 1 user biasa
        DB::table('users')->insert([
            'name' => 'User Karina',
            'email' => 'user@karina.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus kedua user jika rollback
        DB::table('users')->whereIn('email', ['admin@karina.com', 'user@karina.com'])->delete();

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
