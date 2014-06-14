<?php

namespace dizews\qunit;

use dizews\qunit\helpers\FileHelper;
use Composer\Installer\LibraryInstaller;


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

        $path = $options[self::EXTRA_SKELETON]['path'];

        echo "Setting init tests skeleton: $path ...";
        if (is_dir($path)) {
            FileHelper::copyDirectory(self::getSourceSkeletonPath(), $path);
            echo "done\n";
        } else {
            echo "The directory was not found: " . getcwd() . DIRECTORY_SEPARATOR . $path;

            return;
        }
    }

    private static function getSourceSkeletonPath()
    {
        getcwd() . DIRECTORY_SEPARATOR .'installer'. DIRECTORY_SEPARATOR . self::EXTRA_SKELETON;
    }
}