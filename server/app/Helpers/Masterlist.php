<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class Masterlist {
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
      $filename = "Masterlist.csv";
      $filepath = "";

      if (
        !File::exists("{$filepath}{$filename}")
        || $overwrite
      )
        $sheet->storeAs($filepath, $filename);

      return true;
    } catch (\Exception $e) {
      echo $e->getMessage();
      return false;
    }
  }
}