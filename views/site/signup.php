<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Регистрация';

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для регистрации:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

        <?= $form->field($model, 'fio')->label('Ф.И.О')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email')->label('Эл.почта')->textInput() ?>

        <?= $form->field($model, 'phone', )->label('Телефон')->textInput() ?>

        <?= $form->field($model, 'password')->label('Пароль')->passwordInput() ?>

        <?= $form->field($model, 'password_repeat')->label('Повторите пароль')->passwordInput() ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className())->label('Код верификации') ?>

        <div class="form-group">
            <div class="">
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>


</div>
