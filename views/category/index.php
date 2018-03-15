<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>MANAGE PRODUCT DEFECTS</h1>
<div class="container">

    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
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
                            'class' => 'btn btn-primary',                           'data' => [
                                'confirm' => 'Are you absolutely sure ? You will lose all the information about this product defect with this action.',
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