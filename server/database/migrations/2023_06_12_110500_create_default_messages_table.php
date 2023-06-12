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
        Schema::create('default_messages', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('value');
            $table->timestamps();
        });

        DB::table('default_messages')->insert([
            [
                'key' => 'candidate_win',
                'value' => 'Won by majority',
            ],
            [
                'key' => 'no_student_id',
                'value' => 'Account with the student ID does not exist. Register if you have not created your account yet',
            ],
            [
                'key' => 'no_election',
                'value' => 'Election period has not started',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_messages');
    }
};
