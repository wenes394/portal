<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bildiriler */

$this->title = 'Update Bildiriler: ' . $model->self_id;
$this->params['breadcrumbs'][] = ['label' => 'Bildirilers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->self_id, 'url' => ['view', 'id' => $model->self_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bildiriler-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
