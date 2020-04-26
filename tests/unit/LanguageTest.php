<?php

use Codeception\Test\Unit;
use Pixelairport\Locale\Language;

class LanguageTest extends Unit
{
    /**
     * @param string $locale 
     * @dataProvider languageDataProvider
     */
    public function testGettingLanguage($locale)
    {
        $this->assertEquals('Spanish', Language::get('es', $locale));
    }
    
    public function languageDataProvider()
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
