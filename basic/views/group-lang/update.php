<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupLang */

$this->title = 'Редактировать запись: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Языковые группы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="group-lang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
