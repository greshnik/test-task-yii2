<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii View Tour';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?php foreach ($tour->getFields() as $key => $field): ?>
                <?php echo $key ?> - <?php echo $field ?><br/>
            <?php endforeach; ?>
        </div>

    </div>
</div>