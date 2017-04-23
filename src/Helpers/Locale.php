<?php

namespace Pixelairport\Locale\Helpers;

class Locale
{

    /**
     * Get the vendor base path.
     *
     * @return string
     */
    private static function getVendorPath()
    {

        $rClass = new \ReflectionClass('Pixelairport\Locale\Helpers\Locale');

        return sprintf('%s/../../../../', dirname($rClass->getFileName()));

    }

    /**
     * Returns an translated array.
     *
     * @param string  Language to load (e.g. 'de','en','it').
     * @param string  Extension type name (e.g. 'json','php','csv').
     *
     * @return array
     */
    public static function all($lang, $extension = 'php')
    {

        // Get full path to file
        $dataPath = self::getVendorPath().static::$sVendorPath.'/'.$lang.'/'.static::$sDataFile.'.'.$extension;

        // Return file if exist
        if (is_file($dataPath)) {
            return require($dataPath);
        }

        return [];

    }

}