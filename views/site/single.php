<?php


foreach ($reviews as $review): ?>

    <div class="bottom-comment mt-3">
        <h4><?= $review->title; ?></h4>


        <div class="comment-text">

            <p class="para"><?= $review->text; ?></p>

            <img src="<?= $review->getImage();?>" alt="" width="400"  ><br><br>

            <p class="comment-date"><?= $review->date_create; ?> Рейтинг: <?= $review->rating; ?></p>



        </div>
    </div>


<?php endforeach; ?>