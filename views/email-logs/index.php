<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DefectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Email Logs');
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>EMAIL LOGS</h1>
                               
    <div class="container">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
         'tableOptions' => [
            'class' => 'table table-hover',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'email:email',
            'subject',
            'status',
            'initial_date',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'buttons'=>[
                'update' => function ($url, $model, $key) {
                    if(Yii::$app->user->identity->user_type==1)
                    return Html::a('<i class="fa fa-eye"></i>', $url,['class'=>'btn btn-sm btn-primary', 'title'=>'View Defects']);
                },
                ]

            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
<div class="actions">
  <a href="<?php echo Yii::$app->request->baseUrl.'/defect/index'?>" class="btn-get-started">BACK</a>
</div>

