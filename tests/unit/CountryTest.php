<?php

use Codeception\Test\Unit;
use Pixelairport\Locale\Country;

class CountryTest extends Unit
{
    /**
     * @param string $locale 
     * @dataProvider countryDataProvider
     */
    public function testGettingCountry($locale)
    {
        $this->assertEquals('Spain', Country::get('ES', $locale));
    }
    
    public function countryDataProvider()
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
