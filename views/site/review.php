<?php use yii\helpers\Url;

if (!empty($reviews)): ?>

    <?php foreach ($reviews as $review): ?>

        <div class="bottom-comment">
            <h4><?= $review->title; ?></h4>

            <div class="comment-text">

                <p class="para"><?= $review->text; ?></p>

                <img src="<?= $review->getImage();?>" alt="" width="400"  >

                <h5><?= $review->id_author; ?></h5>

                <p class="comment-date"><?= $review->date_create; ?> Рейтинг: <?= $review->rating; ?></p>



            </div>
        </div>


    <?php endforeach; ?>

<?php endif; ?>


