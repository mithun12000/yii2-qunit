<?php

namespace dizews\qunit;

use dizews\qunit\helpers\FileHelper;
use Composer\Installer\LibraryInstaller;
use Composer\Script\CommandEvent;


class Installer extends LibraryInstaller
{
    const EXTRA_SKELETON = 'skeleton';

    /**
     * Sets the correct skeleton for the unit tests.
     * @param CommandEvent $event
     */
    public static function initTestsSkeleton($event)
    {
        $options = $event->getComposer()->getPackage()->getExtra();
        if (!isset($options[self::EXTRA_SKELETON], $options[self::EXTRA_SKELETON]['path'])) {
            $path = 'tests/js';
        } else {
            $path = $options[self::EXTRA_SKELETON]['path'];
        }
        $path = getcwd() . DIRECTORY_SEPARATOR . $path;


        echo "Setting init tests skeleton: {$path} ...\n";
        if (!file_exists($path)) {
            if (FileHelper::createDirectory($path)) {
                FileHelper::copyDirectory(self::getSourceSkeletonPath(), $path);
                echo "done\n";
            } else {
                echo "The directory was not found: " . $path ."\n";
            }
        } else {
            echo "{$path} directory is exists\n";

            return;
        }
    }

    private static function getSourceSkeletonPath()
    {
        return  __DIR__ . DIRECTORY_SEPARATOR .'installer'. DIRECTORY_SEPARATOR . self::EXTRA_SKELETON;
    }

}
