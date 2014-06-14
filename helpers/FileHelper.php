<?php

namespace dizews\qunit\helpers;


class FileHelper extends \yii\helpers\FileHelper
{
    /**
     * Scan a directory
     * @param string $dir the directory to be scanned.
     * @param integer $depth
     * @return array
     */
    public static function scanDirectory($dir, $depth = 1)
    {
        $list = [];
        if (!is_dir($dir) || !($handle = opendir($dir))) {
            return $list;
        }
        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            $path = $dir . DIRECTORY_SEPARATOR . $file;
            if (is_file($path)) {
                $list[] = $path;
            } else {
                array_merge(
                    $list,
                    static::scanDirectory($path, $depth-1)
                );
            }
        }
        closedir($handle);

        return $list;
    }


}