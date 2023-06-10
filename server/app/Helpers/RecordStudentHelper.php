<?php

namespace App\Helpers;

use App\Models\RecordStudent;
use Illuminate\Support\Str;

class RecordStudentHelper {
  /**
   * Since record students are also created through
   * the creation of an election record, this allows
   * reuse for both controllers
   */
  public static function createRecordStudent(
    int $electionId,
    string $studentId,
  ) {
    try {
      $values = [
        'election_id' => $electionId,
        'student_id' => $studentId,
        'access_code' => self::generateAccessCode(),
        'is_invalid' => false,
      ];

      $recordStudent = RecordStudent::create($values);

      return $recordStudent;
    } catch (\Exception $e) {
      return null;
    }
  }

    /**
     * Helper function.
     * 
     * Generates an access code that will be applied to
     * a particular student for a given election record.
     */
    public static function generateAccessCode() {
        return Str::random(6);
    }
}