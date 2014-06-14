QUnit on Yii2
==============

QUnit JavaScript Unit Testing framework for Yii2.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Add

```
"dizews/yii2-qunit": "*"
```

to the require-dev section of your composer.json.

and add

```
"post-install-cmd": [
    "dizews\\qunit\\Installer::initTestsSkeleton"
]
```

to the scripts section of your composer.json and run

```
php composer.phar install && php composer.phar run-script post-install-cmd
```


General Usage
-------------

To use this extension, simply add the following code in your application configuration:

```php
return [
    //....
    'modules' => [
        'qunit' => [
            'class' => 'dizews\qunit\Module'
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
                fixtures    containt fixtures
                example.js  example of test
            test_helper.js  javascript test helper
            test_helper.css css test helper
            