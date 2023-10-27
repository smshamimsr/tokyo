<?php

namespace App\Helper;

use Intervention\Image\Facades\Image;

class Helper
{
    /**
     * Summary of imageUpload
     * @param mixed $photo
     * @param mixed $width
     * @param mixed $height
     * @param mixed $path
     * @param mixed $name
     * @return void
     */
    public static function imageUpload($photo, $width, $height, $path, $name)
    {
        Image::make($photo)->resize($width, $height)->save(public_path($path) . $name, 50);
    }

    /**
     * Summary of unlinkImage
     * @param mixed $path
     * @param mixed $photo
     * @return void
     */
    public static function unlinkImage($path, $photo)
    {
        $oldPhoto = $path . $photo;
        if (file_exists($oldPhoto)) {
            unlink($oldPhoto);
        }
    }
}