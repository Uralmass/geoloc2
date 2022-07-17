<?php

/** @var yii\web\View $this */

use app\models\City;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Отзовик 2.0';
$cities=city::find()->all();

session_start();
if(!isset($_SESSION['city'])) {
    $_SESSION['city']=1;
}
$city_id = $_SESSION['city'];
$city = $cities[$city_id];

?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <script src="http://yastatic.net/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
    <script type="text/javascript">
        window.onload = function () {
            jQuery("#user-city").text(ymaps.geolocation.city);
            jQuery("#user-region").text(ymaps.geolocation.region);
            jQuery("#user-country").text(ymaps.geolocation.country);
        }
    </script>


    <div id="user-city"></div> <div id="user-region"></div> <div id="user-
country"></div>
 Всё верно?

    <a class="btn btn-primary" href="site/review?id=1" role="button">Да</a>
    <a class="btn btn-primary" href="#" role="button">Нет</a>




    <?php foreach ($cities as $city): ?>

        <a href="<?= Url::toRoute(['site/review', 'id' => $city->id]); ?>"><?= $city->name ?></a>

   <?php endforeach; ?>





</div>
