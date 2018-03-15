<?php

/* @var $this yii\web\View */

$this->title = 'Charles & Keith Repair Management System';
?>
<!-- Home Page -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<h1>ADMINISTRATOR SETTINGS</h1>
<br/>
<div class="container">
     <div class="col-md-6 col-xs-6">
        <a href="<?php echo Yii::$app->request->baseUrl.'/user/create'?>" class="btn btn-primary btn-block btn-lg">
            <i class="fa fa-users fa-5" id="icone_grande"></i> <br><br>
            <span class="texto_grande"><i class="fa fa-plus-circle fa-5"></i> CREATE USER</span></a>
            
            <div class="actions text-center">
  <a href="<?php echo Yii::$app->request->baseUrl.'/user/index'?>" class="btn-services">MANAGE USER</a>
</div>
      </div>
      <div class="col-md-6 col-xs-6">
        <a href="<?php echo Yii::$app->request->baseUrl.'/product/create'?>" class="btn btn-primary btn-block btn-lg">
            <i class="fa fa-shopping-bag fa-5" id="icone_grande"></i> <br><br>
            <span class="texto_grande"><i class="fa fa-plus-circle fa-5"></i> ADD PRODUCTS</span></a>
        <div class="actions text-center">
  <a href="<?php echo Yii::$app->request->baseUrl.'/product/index'?>" class="btn-services">MANAGE PRODUCTS</a>
</div>
      </div>
      <div class="col-md-6 col-xs-6">
        <a href="<?php echo Yii::$app->request->baseUrl.'/category/create'?>" class="btn btn-primary btn-block btn-lg">
            <i class="fa fa-bug fa-5" id="icone_grande"></i> <br><br>
            <span class="texto_grande"><i class="fa fa-plus-circle fa-5"></i> ADD DEFECT</span></a>
        <div class="actions text-center">
  <a href="<?php echo Yii::$app->request->baseUrl.'/category/index'?>" class="btn-services">MANAGE DEFECT</a>
</div>
      </div>
      <div class="col-md-6 col-xs-6">
        <a href="<?php echo Yii::$app->request->baseUrl.'/outlet/create'?>" class="btn btn-primary btn-block btn-lg">
            <i class="fa fa-home fa-5" id="icone_grande"></i> <br><br>
            <span class="texto_grande"><i class="fa fa-plus-circle fa-5"></i> ADD OUTLETS</span></a>
    <div class="actions text-center">
  <a href="<?php echo Yii::$app->request->baseUrl.'/outlet/index'?>" class="btn-services">MANAGE OUTLETS</a>
</div>
      </div> 
</div>
<br/>
<div class="actions">
  <a href="<?php echo Yii::$app->request->baseUrl.'/site/index'?>" class="btn-services">BACK</a>
</div>

<a href="<?php echo Yii::$app->request->baseUrl.'/site/logout'?>" id="submission-logout"><i class="fa fa-sign-out fa-3x bottom-icon" aria-hidden="true"></i></a>



