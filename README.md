# Mage2 Module TestTask WeatherWidget

    ``testtask/module-weatherwidget``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Weather Widget

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/TestTask`
 - Enable the module by running `php bin/magento module:enable TestTask_WeatherWidget`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require testtask/module-weatherwidget`
 - enable the module by running `php bin/magento module:enable TestTask_WeatherWidget`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - enable (weather/general/enable)

 - api_key (weather/general/api_key)

 - units (weather/general/units)


## Specifications

 - Cronjob
	- testtask_weatherwidget_weatherapicall

 - Widget
	- weatherInfo


## Attributes



