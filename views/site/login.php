<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block animation-fadeInQuick">
                <!-- Login Title -->
                <div class="block-title">
                    <h2>Please Login</h2>
                </div>
                <!-- END Login Title -->
    
    <?php $form = ActiveForm::begin([
        'id' => 'form-login',
        'options' => [
                'class' => 'form-horizontal'
        ],
        // 'layout' => 'horizontal',

        'fieldConfig' => [
             'template' => "{label}\n<div class=\"col-xs-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
             'labelOptions' => ['class' => 'col-xs-12'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group form-actions">
            
            <div class="col-xs-12 text-right">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
    
</div>
