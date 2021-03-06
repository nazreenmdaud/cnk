<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmailLogs */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Email Logs',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Email Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?= $this->render('_form', [
        'model' => $model,
]) ?>
