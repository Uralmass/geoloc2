<?php

/** @var yii\web\View $this */

use app\models\City;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

require_once "cities.php";
//require_once  'C:\OpenServer\domains\geoloc\vendor\autoload.php';

session_start();

$city_id = $_SESSION['city'];


$city = $cities[$city_id];

//$ip= "93.170.46.104";
//$geoip= geoip_record_by_name($ip);
//$gorod = $geoip['city'];
//var_dump($city);

if (isset($_SESSION['city'])) {
     header('location:http://geoloc/site/review?id=' . "$city_id");
      die;
} else {
    ?>
    <script>
        window.addEventListener('load', function () {
            const elemModal = document.querySelector('#modal');
            const modal = new bootstrap.Modal(elemModal);
            modal.show();
        });
    </script>
<?php } ?>


<?php

// $_SESSION['city']=1;


$this->title = 'Отзовик 2.0';
//$cities = city::find()->all();

?>


<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <script src="http://yastatic.net/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU"
            type="text/javascript"></script>
    <script type="text/javascript">
        window.onload = function () {
            jQuery("#user-city").text(ymaps.geolocation.city);
            jQuery("#user-region").text(ymaps.geolocation.region);
            jQuery("#user-country").text(ymaps.geolocation.country);
        }
        console.log(ymaps);
    </script>

</div>
Город текущей сессии: <?php echo $city; ?>
<form action="" method="post">

    <div class="modal fade" id="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Приветствую</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    Ваш город:
                    <div id="user-city"></div>

                    <a class="btn btn-primary " href="site/review?id=1" role="button ">Верно</a
                    <br><br><br>
                    Если нет, выберите город из списка ниже:
                    <br>

                    <?php

                    foreach ($cities as $id => $city) {

                          echo '<li><a href="site/review?id=' . $id . '">' . $city . '</li>';
                    }
                    ?>

</form>




