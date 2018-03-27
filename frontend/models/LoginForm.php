<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe;
    private $_user;
    private $_a = true;
    /**
     * @inheritdoc 数据模型验证规则
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe','boolean'],
            ['password','validatePassword'],
        ];
    }

    //表单验证规则 rules 有调用此方法验证
    public function validatePassword($att,$params){
        $user = $this->getUser();
        if(!$user || !$user->validatePassword($this->password)){
            $this->_a = false;
//            $this->addError($att,'用户名或密码有误');
            Yii::$app->session->setFlash('错误提示','用户名或密码有误');
        }
    }

    public function login(){
        //调用规则里的是否为空验证
        if($this->validate() && $this->_a == true){
            return Yii::$app->user->login($this->getUser(),$this->rememberMe?3600*24*30:0);
        }else{
            return false;
        }
//        var_dump($this->getUser());
//        $user = User::findOne(['username'=>$this->username]);
//        if(is_null($user)){
//            Yii::$app->session->setFlash('错误提示','用户名有误');
////            $this->addError('username','用户名输入有误');
//            return false;
//        }else{
//            if(Yii::$app->security->validatePassword($this->password,$user->password_hash) && Yii::$app->user->login($user)){
//                return true;
//            }else{
//                Yii::$app->session->setFlash('错误提示','密码有误');
////                $this->addError('password','密码输入有误');
//                return false;
//            }
//        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => 'Auth Key',
            'password' => '密码',
            'password_hash' => '密码',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getUser(){
        if($this->_user === null){
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }
}
