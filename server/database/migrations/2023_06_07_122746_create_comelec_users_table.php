<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comelec_users', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 20);
            $table->string('username', 50);
            $table->string('name', 100);
            $table->string('password', 60);
            
            // 's' -> Super Admin
            // 'a' -> Admin
            // 'c' -> Commissioner
            // 'm' -> Student Accounts Manager
            // 'p' -> Poll Worker
            $table->char('role', 1);

            $table->timestamps();

            $table->foreign('student_id')
                ->references('student_id')
                ->on('students')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        // Insert a super admin. Used to first access
        // the system.
        DB::table('comelec_users')->insert([
            'student_id' => '0000',
            'username' => 'admin',
            'name' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 's',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comelec_users');
    }
};
