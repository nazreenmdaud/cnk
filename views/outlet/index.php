<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Outlet');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>MANAGE OUTLET</h1>

    <div class="container">
    

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            [
                'attribute'=>'outlet_type',
                'filter'=>[1=>'Charles & Keith',2=>'Pedro'],
                'value'=>function($model)
                        {
                            $a = [1=>'Charles & Keith',2=>'Pedro'];
                            if(isset($a[$model->outlet_type]))
                                return $a[$model->outlet_type];
                        }
            ],
            'email:ntext',
            'location',
            'contact_no',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons'=>[
                'update' => function ($url, $model, $key) {
                    return Html::a('<i class="fa fa-pencil"></i>', $url,['class'=>'btn btn-primary']);
                },
                'delete' => function($url, $model){                        return Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-primary',                           'data' => [
                                'confirm' => 'Are you absolutely sure ? You will lose all the information about this outlet with this action.',
                                'method' => 'post',                            ],                        ]);                    }
                ]

            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

 </div>
 
 <div class="actions">
        <a href="<?php echo Yii::$app->request->baseUrl.'/site/setting'?>" class="btn-services">BACK</a>
        </div>
 

<a href="<?php echo Yii::$app->request->baseUrl.'/site/logout'?>" id="submission-logout"><i class="fa fa-sign-out fa-3x bottom-icon" aria-hidden="true"></i></a>
