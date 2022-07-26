
<?php use yii\bootstrap4\Modal;
use yii\helpers\Url;
use app\models\User;
use app\models\city;


session_start();
$city_id=$_GET['id'];
$_SESSION['city']=$city_id;

if (!empty($reviews)): ?>

    Вы выбрали город:  <?php echo $city->name; ?>

    <?php foreach ($reviews as $review): ?>


        <div class="bottom-comment mt-3">
            <h4><?= $review->title; ?></h4>

            <div class="comment-text">

                <p class="para"><?= $review->text; ?></p>

                <img src="<?= $review->getImage();?>" alt="" width="400"  ><br><br>

               <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                    <?= $review->author->fio?>
                </button>



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
                                 <?= $review->author->fio?><br>
                                 <?= $review->author->email?><br>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a class="btn btn-primary" href="<?= Url::toRoute(['site/single','id'=>$review->id_author])?>" role="button">Отзывы автора</a>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <p class="comment-date"><?= $review->date_create; ?> Рейтинг: <?= $review->rating; ?></p>



            </div>
        </div>


    <?php endforeach; ?>

<?php endif; ?>



