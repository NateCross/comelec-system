<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id', 20)->primary();
            $table->string('full_name', 70);
            $table->string('college', 50);
            $table->boolean('is_enrolled')->default(false);
            $table->timestamps();
        });

        // Insert a default student. This is used
        // for the super admin. Should ideally be hidden
        // in DB queries for students.
        DB::table('students')->insert([
            'student_id' => '0000',
            'full_name' => 'Admin',
            'college' => 'Admin',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
