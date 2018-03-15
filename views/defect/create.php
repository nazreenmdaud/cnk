<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Defect */

$this->title = Yii::t('app', 'Create Customer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Defects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_formc', [
        'model' => $model,
        'modelC'=>$modelC
    ]) ?>

