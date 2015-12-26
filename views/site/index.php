<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    [
                        'attribute' => 'name',
                        'label'=>'Name',
                        'format'=>'text',
                        'content'=>function($data){
                            return Html::a($data->name, Url::to(['/site/tour', 'id' => $data->id]));
                        },
                    ],
                    'description:ntext',
                    'countAdults',
                    'countChildren',
                    'countSuckling',
                ],
            ]); ?>
        </div>

    </div>
</div>
