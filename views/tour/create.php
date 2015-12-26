<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tour */

$this->title = 'Create Tour';
$this->params['breadcrumbs'][] = ['label' => 'Tours', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsOptionValue' => $modelsOptionValue
    ]) ?>

</div>
