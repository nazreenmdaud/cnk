<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
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

    
            <?= $form->field($model, 'name')->textInput(['maxlength' => true,'placeHolder'=>'Defect Name']) ?>
             
            <?= $form->field($model, 'ch_name')->textInput(['maxlength' => true,'placeHolder'=>'Ch Name']) ?>
            
            <?= $form->field($model, 'main_category')->textInput(['maxlength' => true,'placeHolder'=>'Defect Category']) ?>
            
            <?= $form->field($model, 'ch_main_category')->textInput(['maxlength' => true,'placeHolder'=>'Ch Name']) ?>
            
            <?= $form->field($model, 'description')->textInput(['maxlength' => true,'placeHolder'=>'Description']) ?>

    
     <div class="lastbutton">
      <button type="submit" class="btn"><?php echo ($model->isNewRecord) ? "Create" : "Update" ?></button>
    </div>
    <?php ActiveForm::end(); ?>

</div>


