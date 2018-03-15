<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\DefectDetail;
use app\models\User;
use app\models\Product;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\ProductDefectCategory;
use yii\widgets\ActiveForm;

// $c = Category::find()->all();
// $c_arr = ArrayHelper::map('id', 'main_category');
// $d_arr = ArrayHelper::map('id', 'name');


/* @var $this yii\web\View */
/* @var $model app\models\Defect */

$this->title = $model->defect_no;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Defects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <div class="header-section">
                <h1>Defects</h1>
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
                <h2><?= Html::encode($this->title) ?></h2>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <!-- Block -->
                    <div class="block">
                        <!-- Block Title -->
                        <div class="block-title">
                            <h2>Customer Info</h2>
                        </div>
                        <!-- END Block Title -->

                        <!-- Block Content -->
                        <p>Defect ID    : <?php echo $model->defect_no; ?></p>
                        <p>Name    : <?php echo $model->customer->customer_name; ?></p>
                        <p>Email   : <?php echo $model->customer->email; ?></p>
                        <p>Address : <?php echo $model->customer->address; ?></p>
                        <p>Phone   : <?php echo $model->customer->contact; ?></p>
                        <!-- END Block Content -->
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- Block -->
                    <div class="block">
                        <!-- Block Title -->
                        <div class="block-title">
                            <h2>Defect Image</h2>
                        </div>

                        <img style="width: 100%;" src="<?php echo Yii::$app->request->baseUrl . '/' . $details->image ?>" alt="Image" height="167">
                        <!-- END Block Title -->
                        <p><?=$details->notes;?></p>

                    </div>
                </div>
                <?php if ($details->repair_image): ?>
                    <div class="col-sm-4">
                        <!-- Block -->
                        <div class="block">
                            <!-- Block Title -->
                            <div class="block-title">
                                <h2>Repaired Image</h2>
                            </div>
                            <!-- END Block Title -->

                            <img style="width: 100%;" src="<?php echo Yii::$app->request->baseUrl . '/' . $details->repair_image ?>" alt="Image" height="167">

                            <p><?=$details->what_done_for_repair;?></p>
                        </div>
                    </div>

                <?php endif; ?>
            </div>
            <div class="row">


                <div class="col-lg-12">
                    <!-- Partial Responsive Block -->
                    <div class="block">
                        <!-- Partial Responsive Title -->
                        <div class="block-title">
                            <h2>Update Defect Status</h2>
                        </div>
                        <!-- END Partial Responsive Title -->

                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><strong>Success</strong></h4>
                                <p><?php echo Yii::$app->session->getFlash('success'); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php
                        $form = ActiveForm::begin(
                                        [
                                            // 'enableAjaxValidation' => true,
                                            'options' => [
                                                'class' => 'form-horizontal form-bordered',
                                                'enctype' => 'multipart/form-data',
                                            ], 'fieldConfig' => [
                                                'template' => "{label}\n<div class=\"col-xs-6\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                                'labelOptions' => ['class' => 'col-xs-12'],
                        ]]);
                        ?>
                        <?= $form->field($details, 'what_done_for_repair')->textInput(['maxlength' => true]) ?>

                        <?php
                        $arr = [1 => 'Pending', 2 => 'Repaired'];
                        ?>
                        <?= $form->field($details, 'status')->dropDownList($arr) ?>

                        <?= $form->field($details, 'repair_image')->fileInput(['rows' => 6]) ?>




                        <div class="form-group form-actions">
                            <div class="col-md-9 col-md-offset-3">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('app', 'Back'), ['view', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
                            </div>
                        </div>

<?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>


        </div>
    </div>


</div>


