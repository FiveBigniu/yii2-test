<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/14
 * Time: 10:12
 */

namespace sheila\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex() {
        return $this ->render('index');
    }
}