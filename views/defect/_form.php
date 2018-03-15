<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Defect */
/* @var $form yii\widgets\ActiveForm */
?>

<h1><?= Html::encode($this->title) ?></h1>
<div class="createuser">
        
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
    <?= $form->field($model, 'ch_name')->textInput(['maxlength' => true,'placeHolder'=>'Chinese Name']) ?>

    <?= $form->field($model, 'main_category')->textInput(['maxlength' => true,'placeHolder'=>'Sub Defect Category']) ?>
    <?= $form->field($model, 'ch_main_category')->textInput(['maxlength' => true,'placeHolder'=>'Chinese Name']) ?>

    <div class="form-group row" data-index="0">
                        <div class="col-sm-8">
                            <select name="products[]" class="form-control productid cust_required">
                                <option value="">Select</option>
                                <?php foreach ($products as $row) : ?>
                                    <option value="<?= $row->id ?>"><?= $row->name ?> (<?= $row->ch_name ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
    
    
    

    <div class="lastbutton">
      <button type="submit" class="btn"><?php echo ($model->isNewRecord) ? "Create" : "Update" ?></button>
    </div>
    <?php ActiveForm::end(); ?>
</div>
