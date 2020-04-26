<?php

namespace Pixelairport\Locale;

class Currency extends Lists
{
    /**
     * {@inheritdoc}
     */
    protected static function getDataPath()
    {
        return 'umpirsky/currency-list/data/';
    }

    /**
     * {@inheritdoc}
     */
    protected static function getDataFile()
    {
        return 'currency';
    }
}
