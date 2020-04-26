<?php

use Codeception\Test\Unit;
use Pixelairport\Locale\Locale;

class LocaleTest extends Unit
{
    /**
     * @param string $locale 
     * @dataProvider localeDataProvider
     */
    public function testGettingLocale($locale)
    {
        $this->assertEquals('Spanish', Locale::get('es', $locale));
    }

    /**
     * @param string $locale 
     * @dataProvider nonExistentLocaleProvider
     */
    public function testGettingLocaleNonExistentVariant($locale)
    {
        $this->assertEquals('Spanish', Locale::get($locale, 'en'));
    }

    public function nonExistentLocaleProvider()
    {
        return [
            'es_EN' => ['es_EN'],
            'es_Cyrl_EN' => ['es_Cyrl_EN'],
            'es@CURRENCY=EUR' => ['es@CURRENCY=EUR'],
            'es-EN@CURRENCY=EUR' => ['es-EN@CURRENCY=EUR'],
            'es-Cyrl-EN@CURRENCY=EUR' => ['es-Cyrl-EN@CURRENCY=EUR'],
        ];
    }

    public function localeDataProvider()
    {
        return [
            'getOnlyLanguage' => ['en'],
            'getLanguageAndCountry' => ['en_US'],
            'getLanguageAndCountryWith_country_missing' => ['en_ES'],
            'getLanguageAndCountryWithDashes' => ['en-US'],
            'getLanguageAndCountryWithDashesAndCountryMissing' => ['en-ES'],
        ];
    }
}
