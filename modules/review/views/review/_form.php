<?php
require_once 'C:\OpenServer\domains\geoloc\views\site\cities.php';
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\city;

/* @var $this yii\web\View */
/* @var $model app\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">

<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?

    $listdata=City::find()
        ->select(['id as value', 'name as label'])
        ->asArray()
        ->all();
    ?>

    <?= $form->field($model, 'id_city')->label('Город')->widget(
        AutoComplete::className(), [
      //  'value' => $model->id_city->label,
        'clientOptions' => [
            'source' => $listdata,

        ],
        'options'=>[
            'class'=>'form-control'
        ],


    ]);
    ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput() ?>




    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
