<?php

namespace Pixelairport\Locale;

class Country extends Lists
{
    /**
     * {@inheritdoc}
     */
    protected static function getDataPath()
    {
        return 'umpirsky/country-list/data/';
    }

    /**
     * {@inheritdoc}
     */
    protected static function getDataFile()
    {
        return 'country';
    }
}
