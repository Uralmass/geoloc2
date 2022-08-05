<?php

require_once 'cities.php';
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\city;

?>
<script>
    window.addEventListener('load', function () {
        const elemModal = document.querySelector('#exampleModal');
        const modal = new bootstrap.Modal(elemModal);
        modal.show();
    });
</script>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Данные об авторе</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="review-form">

                   xyz

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-primary"  role="button">Отзывы автора</a>

            </div>
        </div>
    </div>
</div>