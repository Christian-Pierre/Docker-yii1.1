<?php

// change the following paths if necessary
$yii = dirname(__FILE__) . '/yii-1.1.15/yii.php';
$config = array(
    'basePath' => dirname(__FILE__),
    'name' => 'Test Yii App',
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=mysql;dbname=yii_test',
            'username' => 'root',
            'password' => 'root',
        ),
    ),
);

require_once($yii);
Yii::createWebApplication($config)->run();
