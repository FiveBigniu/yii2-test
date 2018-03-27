<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/21
 * Time: 18:20
 */

namespace frontend\widgets;
use yii\base\Widget;

class Alert extends Widget
{
    public function run()
    {
        $flashes = \Yii::$app->session->getAllFlashes();
        foreach ($flashes as $k=>$v){
            $message[]=$k;
            $message[]=$v;
//            var_dump($message);die;
            return $this->render('alertView',['message'=>$message]);
        }
    }

}