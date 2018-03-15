<?php

/* @var $this yii\web\View */

$this->title = 'Charles & Keith Repair Management System';
?>
<!-- Home Page -->
<?php if (Yii::$app->session->hasFlash('success')): ?>
<script type="text/javascript">
	alert("<?php echo Yii::$app->session->getFlash('success'); ?>");
</script>
<?php endif; ?>                        

<h1>Welcome to the Repair Management System</h1>

<div class="actions">
  <?php if(Yii::$app->user->identity->user_type==1 || Yii::$app->user->identity->user_type==2 ):?>
  <a href="<?php echo Yii::$app->request->baseUrl.'/defect/create'?>" class="btn-get-started">NEW SUBMISSION</a>
  <?php endif;?>
  <a href="<?php echo Yii::$app->request->baseUrl.'/defect/index'?>" class="btn-services">VIEW SUBMISSION</a>
</div>

<?php if(Yii::$app->user->identity->user_type==1 && (Yii::$app->controller->id=="site" || Yii::$app->controller->id=="defect" || Yii::$app->controller->id=="email-logs")):?>
<a href="<?php echo Yii::$app->request->baseUrl.'/site/setting'?>" id="settings"><i class="fa fa-cog fa-3x bottom-icon" aria-hidden="true"></i></a>
<?php endif;?>
<a href="<?php echo Yii::$app->request->baseUrl.'/site/logout'?>" id="logout"><i class="fa fa-sign-out fa-3x bottom-icon" aria-hidden="true"></i></a>

