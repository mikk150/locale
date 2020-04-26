<?php

use Codeception\Test\Unit;
use Pixelairport\Locale\Currency;

class CurrencyTest extends Unit
{
    /**
     * @param string $locale 
     * @dataProvider currencyDataProvider
     */
    public function testGettingCurrency($locale)
    {
        $this->assertEquals('Mexican Peso', Currency::get('MXN', $locale));
    }
    
    public function currencyDataProvider()
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
