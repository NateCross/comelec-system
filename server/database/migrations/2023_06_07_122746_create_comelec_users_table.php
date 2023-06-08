<?php

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
        Schema::create('comelec_users', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 20);
            $table->string('username', 50);
            $table->string('name', 100);
            $table->string('password', 60);
            $table->enum('role', [
                'super admin',
                'admin',
                'commissioner',
                'student accounts manager',
                'poll worker',
            ]);
            $table->timestamps();

            $table->foreign('student_id')
                ->references('student_id')
                ->on('students')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comelec_users');
    }
};
