<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = Yii::t('app', 'Create Product Defect');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

 <?= $this->render('_form', [
        'model' => $model,
 ]) ?>

 <div class="actions">
          <a href="<?php echo Yii::$app->request->baseUrl.'/site/setting'?>" class="btn-services">BACK</a>
        </div>
