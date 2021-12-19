<?php
namespace App\Services;

use App\Models\City;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Permission\Models\Role;
use Throwable;

class PhotoService
{
    public function insertPhoto(string $fileName, $file, bool $isMultiple = false)
    {
        if($isMultiple) {
            $filePaths = array();

            foreach($file[$fileName] as $fileDetail) {
                $fileUniqName = rand(0, 1000000) . '--' . time() . '.' . $fileDetail->getClientOriginalExtension();
                $filePath = $fileDetail->storeAs('photos', $fileUniqName, 'public');

                array_push($filePaths, $filePath);
            }

            return $filePaths;
        } else {
            $realFile = $file[$fileName];
            $fileUniqName = rand(0, 1000000) . '--' . time() . '.' . $realFile->getClientOriginalExtension();
            $filePath = $realFile->storeAs('photos', $fileUniqName, 'public');

            return $filePath;
        }
    }
}
