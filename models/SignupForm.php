<?php

namespace app\models;

use yii\base\Model;


class  SignupForm extends Model
{
    public $fio;
    public $email;
    public $phone;
    public $password;
    public $verifyCode;
    public $password_repeat;


    public function rules()
    {
        return [
            [['fio', 'email', 'phone', 'password'], 'required'],
            [['fio','phone'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email'],
            ['verifyCode', 'captcha'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password' , 'message'=>"Passwords don't match"],
            ['password_repeat', 'required'],


        ];

    }

    /**
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        if($this->validate())
        {
            $user= new User;

         //   $user->fio = $this->fio;
          //  $user->email = $this->email;
          //  $user->phone = $this->phone;

           $user->attributes = $this->attributes;

            $user->password=\Yii::$app->security->generatePasswordHash($this->password);

            return $user->create();

        }
    }
}
