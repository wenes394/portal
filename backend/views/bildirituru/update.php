<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bildirituru */

$this->title = 'Update Bildirituru: ' . $model->notice_id;
$this->params['breadcrumbs'][] = ['label' => 'Bildiriturus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->notice_id, 'url' => ['view', 'id' => $model->notice_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bildirituru-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
