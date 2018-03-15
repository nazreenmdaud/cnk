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
<h1>MANAGE DEFECTS</h1>

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
            'ch_name',
            'main_category',
            'ch_main_category',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons'=>[
                'update' => function ($url, $model, $key) {
                    return Html::a('<i class="fa fa-pencil"></i>', $url,['class'=>'btn btn-primary']);
                },
                'delete' => function($url, $model){                        return Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',                           'data' => [
                                'confirm' => 'Are you absolutely sure ? You will lose all the information about this defect with this action.',
                                'method' => 'post',                            ],                        ]);                    }
                ]

            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

 </div>
 
 <div class="actions">
        <a href="<?php echo Yii::$app->request->baseUrl.'/site/index'?>" class="btn-services">BACK TO HOME</a>
        </div>
 

<a href="<?php echo Yii::$app->request->baseUrl.'/site/setting'?>" id="submission-settings"><i class="fa fa-cog fa-3x bottom-icon" aria-hidden="true"></i></a>
<a href="<?php echo Yii::$app->request->baseUrl.'/site/logout'?>" id="submission-logout"><i class="fa fa-sign-out fa-3x bottom-icon" aria-hidden="true"></i></a>