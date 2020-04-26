<?php

namespace Pixelairport\Locale;

abstract class Lists
{
    protected const LOCALE_REGEX = '/^(?<language>[a-z]{2,3})(?:[-_](?<script>[a-zA-Z]{4})){0,1}(?:[-_](?<country>[A-Z]{2})){0,1}/';

    /**
     * @return string
     */
    abstract protected static function getDataPath();

    /**
     * @return string
     */
    abstract protected static function getDataFile();

    /**
     * Get the vendor base path.
     *
     * @return string
     */
    protected static function getVendorPath()
    {
        $reflection = new \ReflectionClass(\Composer\Autoload\ClassLoader::class);
        return dirname(dirname($reflection->getFileName())) . DIRECTORY_SEPARATOR;
    }

    protected static function getLocaleVariants($locale)
    {
        $locales = [];
        if (preg_match(static::LOCALE_REGEX, $locale, $matches)) {
            if (!static::isEmpty($matches, 'language') && !static::isEmpty($matches, 'script') && !static::isEmpty($matches, 'country')) {
                $locales[] = $matches['language'] . '_' . ucfirst(strtolower($matches['script'])) . '_' . $matches['country'];
            }
            if (!static::isEmpty($matches, 'language') && !static::isEmpty($matches, 'script')) {
                $locales[] = $matches['language'] . '_' . ucfirst(strtolower($matches['script']));
            }
            if (!static::isEmpty($matches, 'language') && !static::isEmpty($matches, 'country')) {
                $locales[] = $matches['language'] . '_' . $matches['country'];
            }
            if (!static::isEmpty($matches, 'language')) {
                $locales[] = $matches['language'];
            }
        }
        return $locales;
    }

    private static function isEmpty($matches, $element)
    {
        return !array_key_exists($element, $matches) || $matches[$element] === null || $matches[$element] === [] || $matches[$element] === '';
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
        foreach (static::getLocaleVariants($lang) as $localeVariant) {
            // Get full path to file
            $dataPath = static::getVendorPath() . static::getDataPath() . '/' . $localeVariant . '/' . static::getDataFile() . '.' . $extension;
        }

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
        $all = static::all($lang, $extension);

        if(is_array($all) && array_key_exists($element, $all)){
            return $all[$element];
        }

        return null;
    }
}
