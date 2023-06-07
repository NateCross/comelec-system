<?php

namespace App\Helpers;

use App\Models\Student;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\SimpleExcel\SimpleExcelReader;

class Masterlist {

  // Change these variables to modify
  // the location and filename of list
  private static $FILENAME = "Masterlist.csv";
  private static $FILEPATH = "";

  public static function getMasterlistPath() {
    return self::$FILEPATH . self::$FILENAME;
  }

  /**
   * Saves and changes the active masterlist of the system.
   * This list is used when Student entries are inserted.
   * 
   * Sheets are saved as "Masterlist.csv" in "server/app/Assets/".
   * As such, the full file path is "server/app/Assets/Masterlist.csv"
   * 
   * @param Illuminate\Http\UploadedFile $sheet The raw file of the sheet uploaded from a Laravel Request.
   * @param bool $overwrite If true, will overwrite any existing sheet. Does nothing if there is no existing sheet, or if set to false.
   * @return bool True if successful, false otherwise.
   */
  public static function uploadMasterlist(
    UploadedFile $sheet,
    bool $overwrite = false,
  ): bool {
    try {

      if (
        !File::exists(self::getMasterlistPath())
        || $overwrite
      )
        $sheet->storeAs(self::$FILEPATH, self::$FILENAME);

      return true;
    } catch (\Exception $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public static function getMasterlist() {
    try {
      // $sheet = Storage::get(
      //   self::getMasterlistPath()
      // );
      $sheet = SimpleExcelReader::create(
        public_path()
        . "/../"
        . "/storage/app/"
        . self::getMasterlistPath()
      )->getRows();
      return $sheet;
    } catch (\Exception $e) {
      echo $e->getMessage();
      return null;
    }
  }

  public static function replaceStudentDataFromMasterlist(
    Student $student,
  ): Student {
    try {
      if (!$sheet = self::getMasterlist()) return null;
      if ($row = $sheet->where(
        'student_id', 
        $student->student_id
      )->first()) {
        $student->full_name = $row['full_name'];
        $student->college = $row['college'];
        $student->is_enrolled = true;
      } else {
        $student->is_enrolled = false;
      }
    } catch (\Exception $e) {
      echo $e->getMessage();
    } finally {
      return $student;
    }
  }
}