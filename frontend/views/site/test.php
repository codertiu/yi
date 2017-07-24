<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 16.12.2016
 * Time: 23:29
 */
use frontend\widgets\Poll;

?>

<section class="mt-10 mb-20">
    <div class="container">
        <div class="col-md-3">
            <?php
            echo Poll::widget();
            ?>
        </div>
    </div>
</section>
