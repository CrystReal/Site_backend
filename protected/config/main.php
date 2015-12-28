<?php

return array(
    'import' => array(
        'application.components.*',
        'application.models.*',
        'application.models.enums.*',
        'application.views.widgets.*',
        'application.helpers.AlexBond',
        'application.helpers.toTranslit',
    ),
    'sourceLanguage' => 'ru',
    'preload' => array('bootstrap', 'log', 'debug'),
    'defaultController' => 'Static',
    'homeUrl' => '/',
    'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '/' => 'core/dashboard/index',
                '/gii' => 'gii',
                '/gii/<controller:\w+>' => 'gii/<controller>',
                '/gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
                '/<module>/<c>/<a>' => "<module>/<c>/<a>",
                '/<module>/<c>' => "<module>/<c>/index",
            ),
        ),
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => false,
            'enableJS' => false,
            'bootstrapCss' => false
        ),
        'errorHandler' => array(
            'errorAction' => 'Error/error',
        ),
        'user' => array(
            'class' => 'UserComponent',
            'loginUrl' => array('/personal/auth/index'),
        ),
        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=crmc',
            'username' => 'root',
            'password' => '',
            'emulatePrepare' => true, // необходимо для некоторых версий инсталляций MySQL
            'charset' => 'utf8',
            'enableProfiling' => TRUE,
            'enableParamLogging' => true,
            //'schemaCachingDuration'=>3600,
        ),
        "redis" => array(
            "class" => "ext.YiiRedis.ARedisConnection",
            "hostname" => "localhost",
            "port" => 6379,
            "database" => 10,
            "prefix" => ""
        ),
        "redisCache" => array(
            "class" => "ext.YiiRedis.ARedisConnection",
            "hostname" => "localhost",
            "port" => 6379,
            "database" => 11,
            "prefix" => ""
        ),
        'cache' => [
            'class' => 'CRedisCache',
        ],
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            /*'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => 'smtp.gmail.com',
                'username' => 'XXXX@gmail.com',
                'password' => 'XXXX',
                'port' => '465',
                'encryption'=>'tls',
            ),*/
            'viewPath' => 'application.views.emailTemplates',
            'logging' => true,
            'dryRun' => false
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'trace, info, error, warning',
                ),
            ),
        ),
        'debug' => array(
            'class' => 'ext.yii2-debug.Yii2Debug',
            'allowedIPs' => array('76.168.143.156')
        ),
        'imagemod' => array(
            'class' => 'application.extensions.imagemodifier.CImageModifier',
        ),
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '',
            'ipFilters' => array(),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
        ),
        "personal", "core", "support", "users"
    ),
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'no-reply@crystreal.net',
        'siteUrl' => 'http://crystreal.net',
        'frontendUrl' => 'http://crystreal.net',
        'storeImages' => array(
            'path' => '../www/static/uploads/',
            'thumbPath' => '../www/static/assets/',
            'maxFileSize' => 10 * 1024 * 1024,
            'extensions' => array('jpg', 'jpeg', 'png', 'gif'),
            'types' => array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png'),
            'url' => '../static/uploads/', // With ending slash
            'thumbUrl' => '../static/assets/', // With ending slash
            'sizes' => array(
                'resizeMethod' => 'resize', // resize/adaptiveResize
                'resizeThumbMethod' => 'resize', // resize/adaptiveResize
                'maximum' => array(800, 600), // All uploaded imagesMainController.php
            )
        ),
        'staticPath' => "../www/static",
        'tmpPath' => '../static/tmp/'
    ),
);