<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use ZipArchive;

class ZipController extends Controller
{
    public function downloadZip($request)

    {

        $gallery = Gallery::where('id_code', '=', $request)->first();

        if ($gallery) {

            $files = explode(',', $gallery->images);


            $public_dir = public_path();
            // Zip File Name
            $zipFileName = 'Gallery-' . $request . '.zip';

            $filePath = $public_dir . '/' . $zipFileName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            //$path = storage_path('app/public/photos/1/Documents/');

            // Create ZipArchive Obj
            $zip = new ZipArchive;

            if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
                // Add File in ZipArchive

                foreach ($files as $key => $value) {
                    $relativeNameInZipFile = basename($value);
                    $storage_url = parse_url($value);
                    if (config('fdc.app_public') == true) {
                        $replace = str_replace('/storage/', '/', $storage_url);
                        $fileExactPath = storage_path() . $replace['path'];
                        $zip->addFile($fileExactPath, $relativeNameInZipFile);
                    } else {
                        $replace = str_replace('/storage/', '/home/vagrant/code/pressarea/storage/app/public/', $storage_url);
                        $zip->addFile($replace['path'], $relativeNameInZipFile);
                    }

                }
            }
            // Close ZipArchive
            $zip->close();
        }
        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath = $public_dir . '/' . $zipFileName;

        // Create Download Response
        if (file_exists($filetopath)) {
            return response()->download($filetopath, $zipFileName, $headers);
        }

    }


}
