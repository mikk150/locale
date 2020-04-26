<?php

namespace Pixelairport\Locale;

class Language extends Lists
{
    /**
     * {@inheritdoc}
     */
    protected static function getDataPath()
    {
        return 'umpirsky/language-list/data/';
    }

    /**
     * {@inheritdoc}
     */
    protected static function getDataFile()
    {
        return 'language';
    }
}
