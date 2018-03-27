<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','debug','gii'],//yii调试菜单打开,module配置
    'modules' => [
        'debug' => ['class' => 'yii\debug\Module'],
        'gii' => ['class' => 'yii\gii\Module']
        ],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',//脚手架配置
        ],
        'user' => [
            'identityClass' => 'common\models\User',//model定义的类配置
            'enableAutoLogin' => true,//是否使用cookie和全局的变量
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'db'=>[
            'class'=>'yii\db\Connection',
            'dsn'=>'mysql:host=localhost;dbname=myyii',
            'username'=>'root',
            'password'=>'',
            'charset'=>'utf8',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

//$config['bootstrap'][] = 'debug';
//$config['modules']['debug'] = ['class' => 'yii\gii\Module'];
//$config['bootstrap'][] = 'gii';
//$config['modules']['gii'] = ['class' => 'yii\gii\Module'];
return $config;
