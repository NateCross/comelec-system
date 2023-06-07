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
        Schema::create('election_records', function (Blueprint $table) {
            $table->id();
            $table->char('status', 1);
            // $table->enum('status', [
            //     'active',
            //     'canceled',
            //     'final',
            //     'archived',
            // ]);
            $table->string('name', 100);
            $table->string('description', 255)->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_records');
    }
};
