<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = Yii::t('app', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

 <?= $this->render('_form', [
        'model' => $model,
 ]) ?>
 
 <div class="actions">
          <a href="<?php echo Yii::$app->request->baseUrl.'/site/setting'?>" class="btn-services">BACK</a>
        </div>

