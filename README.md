# Health-checker-check
[![License](https://img.shields.io/github/license/tonicforhealth/health-checker-check.svg?maxAge=2592000)](LICENSE.md)
[![Build Status](https://travis-ci.org/tonicforhealth/health-checker-check.svg?branch=master)](https://travis-ci.org/tonicforhealth/health-checker-check)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/tonicforhealth/health-checker-check/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/tonicforhealth/health-checker-check/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/tonicforhealth/health-checker-check/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/tonicforhealth/health-checker-check/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/f2f30ec5-f19c-4d61-b3d9-c7c517519f06/mini.png)](https://insight.sensiolabs.com/projects/f2f30ec5-f19c-4d61-b3d9-c7c517519f06)


This is base interface and abstract level of the checker.

## Installation using [Composer](http://getcomposer.org/)
------------

```bash
$ composer require tonicforhealth/health-checker-check
```

## Requirements
------------

- PHP 5.5 or higher

## Usage
------------

```php
<?php

use TonicHealthCheck\Check\AbstractCheck;

class WeekendCheck extends AbstractCheck
{
    const GROUP = 'date';
    const COMPONENT = 'weekend';
    const CHECK = 'weekend-date-check';

    public function __construct($checkNode)
    {
        parent::__construct($checkNode);
    }

    /**
     * @return bool
     */
    public function check()
    {
        if ($this->isNotWeekend(date())) {
            throw new CheckException('Unfortunately weekend isn\'t today.');
        }
    }

    protected function isNotWeekend($date)
    {
        return date('N', strtotime($date)) >= 6;
    }
}

$WeekendCheckI = new WeekendCheck('testnode');

$result = $WeekendCheckI->performCheck();

if (!$result->isOk()) {
    echo $result->getError()->getMessage();
}
```
