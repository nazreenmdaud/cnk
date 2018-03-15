<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>MANAGE USER</h1>

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
            'email:ntext',
            // 'password',
            // 'user_type',
            [
                'attribute'=>'user_type',
                'filter'=>[1=>'Admin',2=>'Staff',3=>'Repair Center'],
                'value'=>function($model)
                        {
                            $a = [1=>'Admin',2=>'Staff',3=>'Repair Center'];
                            if(isset($a[$model->user_type]))
                                return $a[$model->user_type];
                        }
            ],
             'employer_id',
             'contact_no',
             
             [
                'attribute'=>'status',
                'filter'=>['Inactive','Active'],
                'format'=>'raw',
                'value'=>function($model)
                        {
                            if($model->status)
                            return '<i class="glyphicon glyphicon-ok"></i>';
                            else
                            return '<i class="glyphicon glyphicon-remove"></i>';
                        }
            ],

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons'=>[
                'update' => function ($url, $model, $key) {
                    return Html::a('<i class="fa fa-pencil"></i>', $url,['class'=>'btn btn-primary']);
                },
                'delete' => function($url, $model){                        
                    return Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-primary',                           'data' => [
                                'confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.',
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
