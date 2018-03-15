<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Outlet',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Outlet'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
 <div class="actions">
        <a href="<?php echo Yii::$app->request->baseUrl.'/product/index'?>" class="btn-get-started">product list</a>
        <a href="<?php echo Yii::$app->request->baseUrl.'/site/index'?>" class="btn-services">BACK TO HOME</a>
        </div>