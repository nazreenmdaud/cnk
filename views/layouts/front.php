<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\FrontAsset;

FrontAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
        <script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

        <script type="text/javascript">
            if (typeof jQuery == 'undefined') {
                document.write('<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl ?>/front/lib/jquery/jquery.min.js"></' + 'script>');
            }
        </script>
        <?php $this->head() ?>
        <style type="text/css">
            body.modal-open {
                overflow: hidden;
                position: fixed;
            }
        </style>
    </head>
    <body>
        <?php $this->beginBody() ?>


        <div id="hero">
            <div class="hero-container">
                <div class="wow fadeIn">
                    <div class="hero-logo">
                        <a href="<?php echo Yii::$app->request->baseUrl . '/site/index' ?>" title="Back to Home">
                            <img class="" src="<?php echo Yii::$app->request->baseUrl ?>/front/img/cnklogo.png" alt="cnk logo">
                        </a>
                    </div>
                    <?= $content ?>

                    <br/><br/><br/><br/>

                    <?php //include('menu.php'); ?>
                </div>

            </div>
        </div>
        <form id='myAwesomeForm' method="post" enctype="multipart/form-data">
            <input type="hidden" id="csrf" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />

            <input type="hidden" id="ctime" value="<?= time() ?>" />

            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Image</h4>
                        </div>
                        <div class="modal-body">
                            <div id="canvasDiv" class="embed-responsive embed-responsive-16by9" style="position: relative; border:1px solid #000;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" id="clear" class="btn btn-default edit">Clear</button>
                            <input type="button" class="btn btn-success" value="save" data-id="0" id="save-btn"  onclick="save()">
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                    $(".alert").slideUp(500);
                });

            })
        </script>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
