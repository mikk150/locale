<?php

use Codeception\Test\Unit;

class ListsTest extends Unit
{
    /**
     * @param string $locale
     * @param array $expectations
     *
     * @dataProvider localeVariantsDataProvider
     */
    public function testLocaleVariants($locale, $expectations)
    {
        $this->assertEquals($expectations, ListsStub::getLocaleVariants($locale));
    }

    public function localeVariantsDataProvider()
    {
        return [
            'en' => ['en', ['en']],
            'en-US' => ['en-US', ['en_US', 'en']],
            'en_US' => ['en_US', ['en_US', 'en']],
            'en-Cyrl-US' => ['en-Cyrl-US', ['en_Cyrl_US', 'en_Cyrl', 'en_US', 'en']],
            'en_Cyrl_US' => ['en_Cyrl_US', ['en_Cyrl_US', 'en_Cyrl', 'en_US', 'en']],
            'en-CYRL-US' => ['en-CYRL-US', ['en_Cyrl_US', 'en_Cyrl', 'en_US', 'en']],
            'en_CYRL_US' => ['en_CYRL_US', ['en_Cyrl_US', 'en_Cyrl', 'en_US', 'en']],
            'en@CURRENCY=EUR' => ['en@CURRENCY=EUR', ['en']],
            'en-US@CURRENCY=EUR' => ['en-US@CURRENCY=EUR', ['en_US', 'en']],
            'en-Cyrl-US@CURRENCY=EUR' => ['en-Cyrl-US@CURRENCY=EUR', ['en_Cyrl_US', 'en_Cyrl', 'en_US', 'en']],
        ];
    }
}