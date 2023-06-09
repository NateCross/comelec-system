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
        Schema::create('record_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('election_id');
            $table->string('student_id', 20);
            $table->unsignedInteger('vote_code')->nullable();
            $table->dateTime('vote_timestamp')->nullable();
            $table->char('access_code', 6);
            $table->dateTime('ac_view_timestamp')->nullable();
            $table->boolean('is_invalid')->default(false);
            $table->timestamps();

            $table->foreign('election_id')
                ->references('id')
                ->on('election_records')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('student_id')
                ->references('student_id')
                ->on('students')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_students');
    }
};
