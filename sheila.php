<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/14
 * Time: 10:07
 */

require (__DIR__ . '/vendor/autoload.php');
require (__DIR__ . '/vendor/yiisoft/yii2/yii.php');

$config = require (__DIR__ . '/sheila/config/web.php');
//var_dump($config);die;
(new yii\web\Application($config)) -> run();