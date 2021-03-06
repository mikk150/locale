<?php

namespace Pixelairport\Locale;

class Lists
{
    /**
     * Get the vendor base path.
     *
     * @return string
     */
    private static function getVendorPath()
    {
        $rClass = new \ReflectionClass('Pixelairport\Locale\Locale');

        return sprintf('%s/../../../', dirname($rClass->getFileName()));
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
    
    /**
     * Returns a single translated element.
     *
     * @param string $element Element for to return.
     * @param string $lang Language to load (e.g. 'de','en','it').
     * @param string  Extension type name (e.g. 'json','php','csv').
     *
     * @return string|null
     */
    public static function get($element, $lang, $extension = 'php')
    {
        $all = self::all($lang, $extension);

        if(is_array($all) && array_key_exists($element, $all)){
            return $all[$element];
        }

        return null;
    }
}
