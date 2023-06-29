<?php

namespace App\Helpers;

use App\Models\ElectionRecord;
use App\Models\RecordStudent;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

class ElectionHelper
{
    public static function getActiveElection()
    {
        try {
            $election = ElectionRecord::query()
                ->where('status', 'a')
                ->latest()
                ->first();
            return $election;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getCandidates(
        ElectionRecord $activeElection,
        Student $student,
    ) {
        $candidates = $activeElection->candidates()
            ->with('position')
            ->with('student')
            ->orderBy('id', 'DESC')
            ->whereRelation('position', 'is_for_all', '=', true)
            ->orWhereRelation('student', 'college', '=', $student->college)
            ->get();
        return $candidates;
    }

    public static function decToBinVoteCode(
        int $voteCode
    ) {
        $activeElection = self::getActiveElection();
        $candidates = $activeElection->candidates;
        $binaryVoteCode = decbin($voteCode);

        $candidateLength = $candidates->count();
        $binaryVoteCodeLength = strlen($binaryVoteCode);

        if ($candidateLength > $binaryVoteCodeLength) {
            $binaryVoteCode =
            sprintf("%0" . $candidateLength . "d", $binaryVoteCode);
        } else if ($candidateLength < $binaryVoteCodeLength) {
            return null;
        }
        
        return $binaryVoteCode;
    }

    public static function processBinVoteCode(
        string $binaryVoteCode,
        ElectionRecord $election,
    ) {
        $candidates = $election->candidates;
        $voteDigits = str_split($binaryVoteCode);
        foreach ($candidates as $key => $candidate) {
            if ($voteDigits[$key] === '1') {
                $candidate->pivot->num_of_votes += 1;
                $candidate->pivot->save();
            }
        }
    }

    public static function countVotes(
        ElectionRecord $election,
    ) {
        $students = $election->validStudents;
        foreach ($students as $student) {
            if (isset($student->pivot->vote_code)) {
                $binaryVoteCode = self::decToBinVoteCode($student->pivot->vote_code);
                self::processBinVoteCode(
                    $binaryVoteCode,
                    $election,
                );
            }
        }
        return $students;
    }

    public static function invalidateVote(
        RecordStudent $recordStudent,
        ElectionRecord $election,
    ) {
        if (!isset($recordStudent->vote_code)) {
            return null;
        }
        $binaryVoteCode = self::decToBinVoteCode(
            $recordStudent->vote_code
        );

        $candidates = $election->candidates;
        $voteDigits = str_split($binaryVoteCode);
        foreach ($candidates as $key => $candidate) {
            if ($voteDigits[$key] === '1') {
                $candidate->pivot->num_of_votes -= 1;
                $candidate->pivot->save();
            }
        }
    }


    // public static function processVote(
    //     Student $student,
    //     string $voteCode,
    // ) {
    //     $activeElection = self::getActiveElection();

    //     $candidates = self::getCandidates(
    //         $activeElection,
    //         $student,
    //     );

    //     array_map(function ($candidate, $voteDigit) {
    //         if ($voteDigit === '1') {
    //             $
    //         }

    //     }, $candidates, $voteCode);


    //     $recordStudent = RecordStudent::query()
    //         ->where('election_id', $activeElection->id)
    //         ->where('student_id', $student->student_id);

    //     $decimalVoteCode = bindec($voteCode);
        
    //     $recordStudent->update([
    //         'vote_code' => $decimalVoteCode,
    //     ]);
    // }

}
