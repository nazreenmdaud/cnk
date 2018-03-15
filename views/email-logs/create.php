<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmailLogs */

$this->title = Yii::t('app', 'Create Email Logs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Email Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-logs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
