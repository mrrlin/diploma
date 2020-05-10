<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dialect */

$this->title = 'Create Dialect';
$this->params['breadcrumbs'][] = ['label' => 'Dialects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dialect-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
