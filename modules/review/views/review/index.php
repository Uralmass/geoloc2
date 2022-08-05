<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="review-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Review', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'id_city',
                'title',
                'text:ntext',
                'rating',
                'image',
                [
                    'format' => 'html',
                    'label' => 'Image',
                    'value' => function ($data) {
                        return Html::img($data->getImage(), ['width' => 200]);
                    }

                ],
                'id_author',
                'date_create',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


            </div>
        </div>
    </div>

<?php $this->registerJs("
    $('.grid-view tbody tr').on('click', function(){
    var data = $(this).data();
    $('#exampleModal').modal('show');
    $('#exampleModal').find('.modal-title').text('id:'+data.key);
    $('#exampleModal').find('.modal-title').load('/review/review/update?id='+data.key);
    });           
    ");
