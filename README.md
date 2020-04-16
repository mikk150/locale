# Locale lists

If you need full arrays with locales, currencies, countries or languages in different languages,
you can simply add this to your project.

## Install

Open terminal (or other command line tool) and open your project root directory and run:

```composer requrie pixelairport/locale```

## How to use it

After add it to your project you are able to call following functions to get the arrays by language:

```php
<?php

// Load pixelairport/locale to your file
use Pixelairport\Locale\Currency;
use Pixelairport\Locale\Country;
use Pixelairport\Locale\Language;
use Pixelairport\Locale\Locale;

// Sample class
class Product {
	public function getSingleLanguage(){
		return Language::get('en','de'); // Returns the german name for english. In this example "Englisch".
	}

	public function languages(){
		return Language::all('de'); // Returns an array with all languages in german
	}
}

?>
```

The method ```Language::all()``` returns all languages. First parameter is to set the language and second is optional for the filetype. The value "php" is the default, but you can also use "csv" or "json" for example. The package is based on data files of github.com/umpirsky.
