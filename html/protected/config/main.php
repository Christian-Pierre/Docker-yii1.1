<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Test Yii App',

    // Preloading 'log' component
    'preload' => array('log'),

    // Autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),

    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=mysql;dbname=yii_test',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),

    'params' => array(
        // custom application parameters
    ),
);
