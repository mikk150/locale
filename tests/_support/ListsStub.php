<?php

use Pixelairport\Locale\Lists;

class ListsStub extends Lists
{
    /**
     * @return string
     */
    protected static function getDataPath()
    {
        return false;
    }

    /**
     * @return string
     */
    protected static function getDataFile()
    {
        return false;
    }

    public static function getLocaleVariants($locale)
    {
        return parent::getLocaleVariants($locale);
    }
}