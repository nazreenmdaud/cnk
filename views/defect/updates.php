<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\DefectDetail;
use app\models\Outlet;
use app\models\User;
use app\models\Product;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\ProductDefectCategory;
use app\models\Images;

// $p = Product::find()->where(['deleted'=>0])->all();
$products = $p = Product::find()->all();

$name_array = ArrayHelper::map($products, 'id', 'name');
$ch_name_array = ArrayHelper::map($products, 'id', 'ch_name');



$c = Category::find()->all();
$c_arr = ArrayHelper::map($c,'id','main_category');
$d_arr = ArrayHelper::map($c,'id','name');

$ch_c_arr = ArrayHelper::map($c,'id','ch_main_category');
$ch_d_arr = ArrayHelper::map($c,'id','ch_name');
?>
<style>
        .errorMessage,.error_div{
                text-align: left;
                color: #ce1e1e;
        }
        .p-image,
        .initial_display img{
                max-width: 300px;
                max-height: 200px;
                margin-bottom: 15px;
                padding-left: 10px;
        }
        
</style>
<h1>submission <?php echo $model->defect_no;?></h1>
<form id='new_submission_form' method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
<div class="container">
    <div class="row">
        <div class="accordions">
            <h2 class="open"><span>SUBMISSION SUMMARY</span></h2>
            <div class="contentspart contentspart4">
                <br>
                <br>
                
                <h3><span>NAME</span> : <?php echo $customer->customer_name;?></h3>
                <h3><span>EMAIL</span> : <?php echo $customer->email;?></h3>
                <h3><span>ADDRESS</span> : <?php echo $customer->address;?></h3>
                <h3><span>CONTACT</span> : <?php echo $customer->contact;?></h3>
                <h3><span>STATUS</span> : <?php echo ($model->status==1) ? "Pending" : "Repaired";?></h3>
                <h3><span>OUTLET NAME</span> : <?php echo $model->outlet_name;?></h3>
                
                <br>
                <hr>
                <?php foreach($product as $list): 
                $d = DefectDetail::find()->where([  'defect_id' => $list->defect_id, 'defect_product_id' => $list->id])->all();
                            $category = ProductDefectCategory::find()->select('prd_defect_category.*')->innerjoin('prd_defect_category', 'prd_defect_category.id=prd_product_defect_category.defect_category_id')
                                        ->where(['product_id' => $list->product_id])->groupBy('main_category')
                                        ->with('category')
                                        ->all();

                                        $i = Images::find()->where(['product_id' => $list->product_id, 'defect_id' => $list->defect_id])->all();                                       

                            ?>
                    <?php foreach ($d as $list1):  ?>

                <br>
                <h3><span>PRODUCT</span> : <?php echo $name_array[$list->product_id]; ?> (<?php echo $ch_name_array[$list->product_id]; ?>)</h3>
                <h3><span>DEFECTS</span> : <?php echo $c_arr[$list1->category_id]?>(<?php echo $ch_c_arr[$list1->category_id]?>)


                <?php 
                if($list1->defect_type_id && isset($d_arr[$list1->defect_type_id])){
                    echo $d_arr[$list1->defect_type_id]."(";
                    echo $ch_d_arr[$list1->defect_type_id].")";
                }
                ?>
                </h3>
                <h3><span>ARTICLE NO</span> : <?php echo $list->articleno; ?></h3>
                <h3><span>SIZE</span> : <?php echo $list->size; ?></h3>
                <h3><span>COLOR</span> : <?php echo $list->color; ?></h3>

                <!-- <h3>What done for repaired:<?=$list1->what_done_for_repair;?></h3> -->
                <?php
                        $arr = [1 => 'Pending', 2 => 'Repaired'];
                ?>
                
                <h3><span>IMAGE UPLOAD</span> : </h3>

                <?php
                foreach($i as $row): 
                ?>
                
                <?php if($row->images):?>
                <img src="<?php echo Yii::$app->request->baseUrl.'/'.$row->images;?>" class="p-image" alt="">
                <?php endif;?>

                

                <h3><span>STATUS</span></h3>
                <select class="form-control bottom-margin" name="status[<?=$row->id?>]">
                    <option <?=($row->status==1) ? "selected":""?> value="1">Pending</option>
                    <option <?=($row->status==2) ? "selected":""?> value="2">Repaired</option>
                </select>



                <h3><span>WHAT DONE FOR REPAIR</span></h3>
                <input type="text" class="form-control bottom-margin" name="what_done_for_repair[<?=$row->id?>]" value="<?=$row->what_done_for_repair?>">         

               
                <h3><span>REPAIRED IMAGE</span></h3>

                <input type="file" class="form-control bottom-margin" name="repair_image[<?=$row->id?>]">         
                
                <?php if($row->repair_image && $row->repair_image):?>
                <img src="<?php echo Yii::$app->request->baseUrl.'/'.$row->repair_image;?>" class="p-image" alt="">
                <?php endif;?>

                <hr>


                <?php endforeach;?>

                
                <?php endforeach;?>
                <?php endforeach;?>
                
                <br />
                <div class="lastbutton">
                    <button type="submit" class="btn">UPDATE</button>
                </div>
                
                    
                
                
                
                
            </div>
    </div>
</div>
</div>
</form>
<div class="actions">
  <a href="<?php echo Yii::$app->request->baseUrl.'/defect/index'?>" class="btn-get-started">BACK</a>
</div>