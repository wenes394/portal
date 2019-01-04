<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bildirituru */

$this->title = 'Create Bildirituru';
$this->params['breadcrumbs'][] = ['label' => 'Bildiriturus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bildirituru-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
