QUnit on Yii2
==============

QUnit JavaScript Unit Testing framework for Yii2.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --dev --prefer-dist dizews/yii2-qunit "*"
```

or add

```
"dizews/yii2-qunit": "*"
```

to the require-dev section of your composer.json.

finally add

```
"post-install-cmd": [
    "dizews\\qunit\\Installer::initTestsSkeleton"
]
```

to the scripts section of your composer.json and run

```
php composer.phar install
```


General Usage
-------------

To use this extension, simply add the following code in your application configuration:

```php
return [
    //....
    'modules' => [
        'qunit' => [
            'class' => 'dizews\qunit\Module',
            //'runner' => ['template' => '@app/views/js-tests-runner/index'] //your own tests runner
        ],
    ],
];
```

You can then access QUnit through the following URL:

```
http://localhost/path/to/index.php?r=qunit
```


or if you have enabled pretty URLs, you may use the following URL:

```
http://localhost/path/to/index.php/qunit
```

Directory structure of tests
-----------------------------

    ...
    tests/
        js/
            unit/
                fixtures    contains fixtures
                example.js  example of test
            test_helper.js  javascript test helper
            test_helper.css css test helper

