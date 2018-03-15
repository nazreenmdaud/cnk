<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DefectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Defects');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>DEFECT SUBMISSION LIST</h1>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><strong>Success</strong></h4>
                <p><?php echo Yii::$app->session->getFlash('success'); ?></p>
            </div>
    <?php endif; ?>                        

    <div class="container">
    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover',
        ],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
             'defect_no',
            // 'user_id',
            // 'customer_name',
            [
                'attribute'=>'customer_id',
                'label' => 'Customer Name',
                'format' => 'raw',
                 'value'=>function($model)
                        {
                            return    $model->customer->customer_name ;
                        }
                ],
                 [
                'attribute'=>'customer_id',
                'label' => 'Contact No',
                'format' => 'raw',
                 'value'=>function($model)
                        {
                            return    $model->customer->contact ;
                        }
                ],
            // 'email:email',
            // 'address:ntext',
            //   '$data->customer->contact',
             // 'status',
             [
                'attribute'=>'status',
                'format'=>'raw',
                'filter'=>[1=>'Pending',2=>'Send To Repair',3=>'Resolved',4=>'Awaiting for Collection',5=>'Completed'],
                'value'=>function($model)
                        {
                            $arr = [1=>'Pending',2=>'Send To Repair',3=>'Resolved',4=>'Awaiting for Collection',5=>'Completed'];

                            $str = '<select class="change-status form-control" data-id="'.$model->id.'">';
                            foreach ($arr as $key => $value) {
                                if($key==$model->status)
                                    $str .= '<option selected value="'.$key.'">'.$value.'</option>';
                                else
                                    $str .= '<option value="'.$key.'">'.$value.'</option>';
                            }
                            $str .= '</select>';

                            return $str;

                        }
            ],
             // 'outlet_name',
            // 'u_date',
            // 'deleted',

            ['class' => 'yii\grid\ActionColumn',
            'template' => ' {view} {update} {sendmail} {delete}',
            'buttons'=>[
                'view' => function ($url, $model, $key) {

                    return Html::a('<i class="fa fa-eye"></i>', $url,['class'=>'btn btn-sm btn-primary','title'=>'More Info']);
                },
                'update' => function ($url, $model, $key) {
                    if(Yii::$app->user->identity->user_type<3)
                    return Html::a('<i class="fa fa-pencil"></i>', $url,['class'=>'btn btn-sm btn-primary', 'title'=>'Edit Defects']);
                    if(Yii::$app->user->identity->user_type==3)
                    return Html::a('<i class="fa fa-pencil"></i>', ['updates', 'id' => $model->id],['class'=>'btn btn-sm btn-primary', 'title'=>'Update Status']);

                },
                'sendmail' => function ($url, $model, $key) {
                    if(Yii::$app->user->identity->user_type<3)
                    return Html::a('<i class="fa fa-envelope-o"></i>', ['sendemail', 'id' => $model->id], [
                            'class' => 'btn btn-sm btn-primary',
                            'title'=>'Notify customer',
                        ]);
                },
                'delete' => function($url, $model){
                        if(Yii::$app->user->identity->user_type<3)
                        return Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-sm btn-primary',
                            'data' => [
                                'confirm' => 'Confirm delete?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]

            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
                                <!-- END Partial Responsive Block -->
                        </div>

       <div class="actions">
          <?php if(Yii::$app->user->identity->user_type==1 ):?>
          <a href="<?php echo Yii::$app->request->baseUrl.'/email-logs/index'?>" class="btn-get-started">EMAIL LOGS</a>
          <?php endif;?>
          <a href="<?php echo Yii::$app->request->baseUrl.'/site/index'?>" class="btn-services">BACK</a>
        </div>
        
<?php if(Yii::$app->user->identity->user_type==1 && (Yii::$app->controller->id=="site" || Yii::$app->controller->id=="defect" || Yii::$app->controller->id=="email-logs")):?>
<a href="<?php echo Yii::$app->request->baseUrl.'/site/setting'?>" id="submission-settings"><i class="fa fa-cog fa-3x bottom-icon" aria-hidden="true"></i></a>
<?php endif;?>
<a href="<?php echo Yii::$app->request->baseUrl.'/site/logout'?>" id="submission-logout"><i class="fa fa-sign-out fa-3x bottom-icon" aria-hidden="true"></i></a>

<script>
$(document).ready(function(){
   
    $(document).on('change','.change-status',function(){
        var id = $(this).attr('data-id');
        var status = $(this).val();
        $.ajax({
          method: "GET",
          url: "<?php echo Yii::$app->request->baseUrl?>/defect/changestatus",
          data: { id: id, status: status },
          success:function( msg ) {
            // if(msg==1)
             alert("Status has been changed successfully");
          }
      });
    })
})

</script>