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
        Schema::create('record_candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('election_id')
                ->constrained('election_records')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('candidate_id')
                ->constrained('candidates')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->boolean('is_elected');
            $table->unsignedBigInteger('num_of_votes');
            $table->string('reason', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_candidates');
    }
};
