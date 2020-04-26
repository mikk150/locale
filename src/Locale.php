<?php

namespace Pixelairport\Locale;

class Locale extends Lists
{
    /**
     * {@inheritdoc}
     */
    protected static function getDataPath()
    {
        return 'umpirsky/locale-list/data/';
    }

    /**
     * {@inheritdoc}
     */
    protected static function getDataFile()
    {
        return 'locales';
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
        $all = static::all($lang, $extension);

        if (is_array($all)) {
            if (array_key_exists($element, $all)) {
                return $all[$element];
            }

            foreach (static::getLocaleVariants($element) as $localeVariant) {
                if (array_key_exists($localeVariant, $all)) {
                    return $all[$localeVariant];
                }
            }
        }

        return null;
    }
}
