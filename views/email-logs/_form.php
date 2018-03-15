<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\EmailLogs */
/* @var $form yii\widgets\ActiveForm */
?>
<h1>EMAIL LOG:<?=$model->id?></h1>
<div class="container-fluid">
  <div class="middle overViewPage">
  <div class="container-fluid">
      <h2 class="pageTitle"><strong>Email sent on <?=$model->initial_date?></strong></h2>
      <?php $form = ActiveForm::begin(
        [
        'options' => [
                // 'class' => 'form-group row', // Don't wrap with "form-group" div
        ],
        'fieldConfig' => [
             'template' => "{label}\n<div class=\"col-sm-8\">{input}{error}</div>\n",
             'labelOptions' => ['class' => 'col-sm-2 col-form-label'],
        ]]); ?>


      <div class="row">
      <div class="col-md-12">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeHolder'=>'Email']) ?>
        <?= $form->field($model, 'subject')->textInput(['maxlength' => true,'placeHolder'=>'Subject of email...']) ?>

        <?= $form->field($model, 'body')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'basic'
        ]) ?>
      </div>
      </div>
      <?php ActiveForm::end(); ?>
      </form> <!--end .row -->

  </div><!--end .container-fluid-->
  </div><!--end .overViewPage-->
</div>
<div class="actions">
  <a href="<?php echo Yii::$app->request->baseUrl.'/email-logs/index'?>" class="btn-get-started">back to email logs</a>
  <a href="<?php echo Yii::$app->request->baseUrl.'/site/index'?>" class="btn-services">BACK TO HOME</a>
</div>