<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <div class="header-section">
                <h1>Profile</h1>
            </div>
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Partial Responsive Block -->
        <div class="block">
            <!-- Partial Responsive Title -->
            <div class="block-title">
                <h2>Profile</h2>
            </div>
            <!-- END Partial Responsive Title -->

            <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><strong>Success</strong></h4>
                <p><?php echo Yii::$app->session->getFlash('success'); ?></p>
            </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(

        [
        // 'enableAjaxValidation' => true,
        'options' => [
                'class' => 'form-horizontal form-bordered'
        ],'fieldConfig' => [
             'template' => "{label}\n<div class=\"col-xs-6\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
             'labelOptions' => ['class' => 'col-xs-12'],
        ]]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>



    <div class="form-group form-actions">
        <div class="col-md-9 col-md-offset-3">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
