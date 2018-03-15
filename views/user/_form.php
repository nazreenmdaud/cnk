<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<h1><?= Html::encode($this->title) ?></h1>
<div class="container">
        
    <?php $form = ActiveForm::begin(
        [
        'options' => [
                // 'class' => 'form-group row', // Don't wrap with "form-group" div
        ],
        'fieldConfig' => [
             'template' => "{label}\n<div class=\"col-sm-8\">{input}{error}</div>\n",
             'labelOptions' => ['class' => 'col-sm-2 col-form-label'],
        ]]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'placeHolder'=>'Name']) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeHolder'=>'Email']) ?>
    <?php if($model->isNewRecord): ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeHolder'=>'Password']) ?>
    <?php endif?>
    <?= $form->field($model, 'user_type')->dropDownList([2=>'Staff',3=>'Repair Center']) ?>
    
    <?= $form->field($model, 'employer_id')->textInput(['maxlength' => true,'placeHolder'=>'Employer ID']) ?>
    
    <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true,'placeHolder'=>'Contact No']) ?>
    
    <?= $form->field($model, 'status')->dropDownList([0=>'Inactive',1=>'Active']) ?>

    <div class="lastbutton">
      <button type="submit" class="btn"><?php echo ($model->isNewRecord) ? "Create" : "Update" ?></button>
    </div>
    <?php ActiveForm::end(); ?>
</div>
