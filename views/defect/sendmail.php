<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model app\models\Defect */
/* @var $form yii\widgets\ActiveForm */
?>
<h1>EMAIL/SMS CENTER</h1>
<div class="container-fluid">
  <div class="middle overViewPage">
  <div class="container-fluid">
    <h2 class="pageTitle"><strong>Compose</strong></h2>
    <?php $form = ActiveForm::begin(
        [
        'fieldConfig' => [
             'template' => "{label}\n<div class=\"col-sm-8\">{input}{error}</div>\n",
             'labelOptions' => ['class' => 'col-sm-2 col-form-label'],
        ]]); ?>


      <div class="row">
      <div class="col-md-12">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeHolder'=>'Email']) ?>
        <?= $form->field($model, 'subject')->textInput(['maxlength' => true,'placeHolder'=>'Subject of email...']) ?>

        <?= $form->field($model, 'email_body')->textarea(); ?>
         
          
          <div class="lastbutton form-group">
            <button type="submit" class="btn">Send email</button>
          </div>


      </div>
      </div>
      <?php ActiveForm::end(); ?>
      
      <br/>
      
       <?php $form = ActiveForm::begin(
        [
            'action' =>['defect/sendmessage?id='.$_GET['id']],
        'fieldConfig' => [
             'template' => "{label}\n<div class=\"col-sm-8\">{input}{error}</div>\n",
             'labelOptions' => ['class' => 'col-sm-2 col-form-label'],
        ]]); ?>


      <div class="row">
      <div class="col-md-12">
        <?= $form->field($model2, 'contact')->textInput(['maxlength' => true,'placeHolder'=>'Contact No']) ?>

        <?= $form->field($model2, 'sms_body')->textarea(); ?>
          
          <div class="lastbutton form-group">
            <button type="submit" class="btn">Send sms</button>
          </div>


      </div>
      </div>
      <?php ActiveForm::end(); ?>

  </div><!--end .container-fluid-->
  </div><!--end .overViewPage-->
</div>
<div class="actions">
  <?php if(Yii::$app->user->identity->user_type==1): ?>
  <a href="<?php echo Yii::$app->request->baseUrl.'/email-logs/index'?>" class="btn-get-started">EMAIL LOGS</a>
<?php endif;?>
  <a href="<?php echo Yii::$app->request->baseUrl.'/defect/index'?>" class="btn-services">BACK</a>
</div>



