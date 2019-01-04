<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bildiriler */

$this->title = 'Create Bildiriler';
$this->params['breadcrumbs'][] = ['label' => 'Bildirilers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bildiriler-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
