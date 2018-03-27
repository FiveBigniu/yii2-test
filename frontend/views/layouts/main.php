<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2333</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
NavBar::begin([
        'options'=>[
                'class'=>'navbar-inverse navbar-fiexd-top'//bootstrap包样式
        ]
]);
$menuItems = [
        ['label'=>'Home','url'=>['/site/index']],//menu组件栏目设置
    ['label'=>'About','url'=>['/site/about']]
];
if(Yii::$app->user->isGuest){//yii方法判断用户是游客
    $menuItems[]=['label'=>'登录','url'=>['/site/login']];
    $menuItems[]=['label'=>'注册','url'=>['/site/signup']];
}else{
    $menuItems[]=['label'=>'注销','url'=>['/site/logout']];
}
echo Nav::widget([
        'options'=>['class'=>'navbar-nav'],//Nav组件加载
    'items'=>$menuItems
]);
NavBar::end();
?>
<div class="myContent">
<?php echo $content;?>
    <?= Alert::widget()?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
