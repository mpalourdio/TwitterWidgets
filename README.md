[![Build Status](https://travis-ci.org/mpalourdio/TwitterWidgets.svg?branch=master)](https://travis-ci.org/mpalourdio/TwitterWidgets)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mpalourdio/TwitterWidgets/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mpalourdio/TwitterWidgets/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mpalourdio/TwitterWidgets/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mpalourdio/TwitterWidgets/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c44e0d12-1786-4e89-ac2c-df1b90d2490d/mini.png)](https://insight.sensiolabs.com/projects/c44e0d12-1786-4e89-ac2c-df1b90d2490d)
[![PHP 7.0+][ico-engine]][lang]

[![MIT Licensed][ico-license]][license]
[ico-engine]: http://img.shields.io/badge/php-7.0+-8892BF.svg
[lang]: http://php.net
[ico-license]: http://img.shields.io/packagist/l/adlawson/veval.svg
[license]: LICENSE

TwitterWidgets
==============

PHP library that helps rendering twitter embedded timelines

Requirements
============
PHP 7.0+ - Only Composer installation supported

Installation
============
Run the command below to install via Composer

```shell
composer require mpalourdio/twitter-widgets
```

Usage
=====

```php
$widgetOptions = new WidgetOptions($options);
$userTimeline  = new TimelineBuilder($widgetOptions);
echo $userTimeline->renderWidget();
```

```$options``` can handle these parameters :  https://dev.twitter.com/web/embedded-timelines#options

Their PHP equivalent as array keys to use in the ```$options``` array are  :

```php
'class'           => 'A css class, by default it will be twitter-timeline',
'href'            => 'The link to the timeline',
'hrefText'        => 'A title for your timeline to display',
'dataWidgetId'    => 'Your data widget ID : must be a string (!)',
'dataTheme'       => 'ex: dark',
'dataLinkColor'   => 'ex: #cc0000',
'width'           => 300 (integer),
'height'          => 400 (integer),
'dataChrome'      => 'noheader nofooter noborders noscrollbar transparent', => a string with options separated by a single space
'dataBorderColor' => 'border color used by the widget',
'language'        => 'The widget language detected from the page, based on the HTML lang attribute of your content. You can also set the HTML lang attribute on the embed code itself.',
'dataTweetLimit'  => 20,
'dataRelated'     => 'benward,endform',
'dataAriaPolite'  => 'polite or assertive',
```

The [TimelineBuilder#renderWidget()](https://github.com/mpalourdio/TwitterWidgets/blob/master/src/Timeline/TimelineBuilder.php#L60-L69) method accepts a boolean to disable the javascript code added to each widget. Useful if you have more that one widget to avoid JS overhead.

When disabled, to add only once the needed javascript to your HTML code, use [OneTimeJsProvider#getOneTimeWidgetJs()](https://github.com/mpalourdio/TwitterWidgets/blob/master/src/Assets/OneTimeJsProvider.php) just before your ```</body>```

More information here : https://dev.twitter.com/web/javascript/loading

ZF2
===

A ZF2 view helper is available here : https://github.com/mpalourdio/zf2-twitter-widget

TWIG
====

A twig extension is available here : https://github.com/mpalourdio/TwitterWidgetBundle
