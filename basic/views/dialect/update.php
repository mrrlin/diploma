<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dialect */

$this->title = 'Редактировать запись: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Диалекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="dialect-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
