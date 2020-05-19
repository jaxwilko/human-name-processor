# Human Name Processor

This package aims to provide quick and easy name processing to produce a standardised format for name handling.

### Installation

```shell script
composer require jaxwilko/human-name-processor
```

### Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$processor = new JaxName\HumanNameProcessor();
$name = $processor->make('Mr. John Smith');
```

The processor make method returns an instance of `JaxName\HumanName` which provides methods for getting elements of 
the name. For instance:

```php
$name->getTitle(); // Mr.
$name->getFirstName(); // John
$name->getLastName(); // Smith

// the class also provides a __toString method

echo $name; // Mr. John Smith
```

### Testing

```shell script
./vendor/bin/phpunit tests --testdox --color
```

