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
            $table->longText('value');
            $table->timestamps();
        });

        DB::table('default_messages')->insert([
            [
                'key' => 'unverified_account',
                'value' => 'Your account will be verified by the COMELEC. Please wait until further notice. Check your email for updates or contact COMELEC if there is an issue.',
            ],
            [
                'key' => 'inactive_account',
                'value' => 'Your account is inactive because you are not enrolled.',
            ],
            [
                'key' => 'no_student_id',
                'value' => 'Student ID does not exist in the system. Contact COMELEC if there is an issue.',
            ],
            [
                'key' => 'student_id_exists',
                'value' => 'Student ID belongs to another account. Contact COMELEC if there is an issue.',
            ],
            [
                'key' => 'student_wrong_password',
                'value' => 'Wrong password. Contact COMELEC if there is an issue.',
            ],
            [
                'key' => 'end_of_voting',
                'value' => 'Thank you for voting with us!',
            ],
            [
                'key' => 'before_election_period',
                'value' => 'The election period has not started.',
            ],
            [
                'key' => 'after_election_period',
                'value' => 'Election has ended. See resultts on the Results page.',
            ],
            [
                'key' => 'voting_no_election',
                'value' => 'There is no incoming election yet.',
            ],
            [
                'key' => 'voting_inactive_account',
                'value' => 'Your account is not active. Contact COMELEC for further details.',
            ],
            [
                'key' => 'invalid_router',
                'value' => 'Connect to the correct WiFi router to access this page.',
            ],
            [
                'key' => 'results_before_election',
                'value' => 'The election period has not started.',
            ],
            [
                'key' => 'results_during_election',
                'value' => 'Results will show after the election period. Vote through the Voting page.',
            ],
            [
                'key' => 'results_no_election',
                'value' => 'There is no incoming election yet.',
            ],
            [
                'key' => 'default_candidate_win',
                'value' => 'Win by majority',
            ],
            [
                'key' => 'default_candidate_party',
                'value' => 'Independent party',
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
