<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupLang */

$this->title = 'Create Group Lang';
$this->params['breadcrumbs'][] = ['label' => 'Group Langs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-lang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
