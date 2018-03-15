<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = Yii::t('app', 'Create Defect');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Defects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

 <?= $this->render('_form', [
        'model' => $model,
 ]) ?>
 
 <div class="actions">
          <a href="<?php echo Yii::$app->request->baseUrl.'/site/index'?>" class="btn-services">BACK TO HOME</a>
        </div>

