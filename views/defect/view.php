<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\DefectDetail;
use app\models\Outlet;
use app\models\User;
use app\models\Product;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\Images;
use app\models\ProductDefectCategory;

// $p = Product::find()->where(['deleted'=>0])->all();
$products = $p = Product::find()->all();

$name_array = ArrayHelper::map($products, 'id', 'name');
$ch_name_array = ArrayHelper::map($products, 'id', 'ch_name');



$c = Category::find()->all();
$c_arr = ArrayHelper::map($c, 'id', 'main_category');
$d_arr = ArrayHelper::map($c, 'id', 'name');

$ch_c_arr = ArrayHelper::map($c, 'id', 'ch_main_category');
$ch_d_arr = ArrayHelper::map($c, 'id', 'ch_name');
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
        margin-bottom: 10px;
    }

</style>
<h1>submission <?php echo $model->defect_no; ?></h1>
<div class="container">
    <div class="row">
        <div class="accordions">
            <h2 class="open"><span>SUBMISSION SUMMARY</span></h2>
            <div class="contentspart contentspart4">
                <br>
                <br>

                <h3><span>NAME</span> : <?php echo $customer->customer_name; ?></h3>
                <h3><span>EMAIL</span> : <?php echo $customer->email; ?></h3>
                <h3><span>ADDRESS</span> : <?php echo $customer->address; ?></h3>
                <h3><span>CONTACT</span> : <?php echo $customer->contact; ?></h3>
                <!-- <h3><span>STATUS</span> : <?php echo ($model->status == 1) ? "Pending" : "Repaired"; ?></h3> -->
                <h3><span>LAST UPDATE BY</span> : <?php
                    if ($model->u_by) {
                        $u = User::findOne($model->u_by);
                        if ($u) {
                            $a = [1 => 'Admin', 2 => 'Staff', 3 => 'Repair Center'];
                            $s = '';
                            if (isset($a[$u->user_type]))
                                $s = $a[$u->user_type];
                            echo $u->name . ' [' . $s . ']';
                        }
                    }
                    ?><?php
                    if ($model->updated_date)
                        echo ' / ' . $model->updated_date;
                    ?>


                </h3>
                <h3><span>STATUS</span> : <?php echo ($model->status == 1) ? "Pending" : "Repaired"; ?></h3>
                <h3><span>OUTLET NAME</span> : <?php echo $model->outlet_name; ?></h3>

                <br>
                <hr>
                <?php
                foreach ($product as $list):
                    $d = DefectDetail::find()->where(['defect_id' => $list->defect_id, 'defect_product_id' => $list->id])->all();
                    $category = ProductDefectCategory::find()->select('prd_defect_category.*')->innerjoin('prd_defect_category', 'prd_defect_category.id=prd_product_defect_category.defect_category_id')
                            ->where(['product_id' => $list->product_id])->groupBy('main_category')
                            ->with('category')
                            ->all();


                    $i = Images::find()->where(['product_id' => $list->product_id, 'defect_id' => $list->defect_id])->all();
                    ?>
                    <?php foreach ($d as $list1):
                        ?>

                        <?php if ($list1->image): ?>
                            <div class="col-sm-3">
                                <a data-fancybox="gallery" href="<?php echo Yii::$app->request->baseUrl . '/' . $list1->image; ?>"><img style="width: 100%;" src="<?php echo Yii::$app->request->baseUrl . '/' . $list1->image; ?>" class="p-image" alt=""></a>
                            </div>
                        <?php endif; ?>

                        <?php
                        $note = array();
                        foreach ($i as $row):
                            if ($row->what_done_for_repair)
                                $note[] = $row->what_done_for_repair;
                            ?>
                            <div class="col-sm-3">
                                <a data-fancybox="gallery" href="<?php echo Yii::$app->request->baseUrl . '/' . $row->images; ?>"><img style="width: 100%;" src="<?php echo Yii::$app->request->baseUrl . '/' . $row->images; ?>" class="p-image" alt=""></a>
                            </div>
                        <?php endforeach; ?>

                        <div class="col-sm-3">
                            <?php if ($list1->repair_image): ?>
                                <a data-fancybox="gallery" href="<?php echo Yii::$app->request->baseUrl . '/' . $list1->repair_image; ?>"><img style="width: 100%; height: 100%;" src="<?php echo Yii::$app->request->baseUrl . '/' . $list1->repair_image; ?>" class="p-image" alt=""></a>
                            <?php endif; ?>
                        </div>

                        <div class="clearfix"></div>
                        <br>

                        <br>
                        <h3><span>PRODUCT</span> : <?php echo $name_array[$list->product_id]; ?> (<?php echo $ch_name_array[$list->product_id]; ?>)</h3>
                        <h3><span>DEFECTS</span> : <?php echo $c_arr[$list1->category_id] ?>(<?php echo $ch_c_arr[$list1->category_id] ?>) 

                            <?php
                            if ($list1->defect_type_id && isset($d_arr[$list1->defect_type_id])) {
                                echo $d_arr[$list1->defect_type_id] . "(";
                                echo $ch_d_arr[$list1->defect_type_id] . ")";
                            }
                            ?>
                        </h3>
                        <h3><span>ARTICLE NO</span> : <?php echo $list->articleno; ?></h3>
                        <h3><span>SIZE</span> : <?php echo $list->size; ?></h3>
                        <h3><span>COLOR</span> : <?php echo $list->color; ?></h3>

                                                <!--<h3><span>STATUS</span> : <?= ($list1->status == 1) ? "Pending" : "Repaired" ?> </h3>-->

                        <h3><span>REPAIR NOTES</span> : <?= implode(', ', $note); ?></h3>


                        <h3><span>REPAIRED IMAGES</span> : </h3>
                        <?php foreach ($i as $row): ?>
                            <?php if ($row->repair_image): ?>
                                <div class="col-sm-3">
                                    <img style="width: 100%; height: 100%;" src="<?php echo Yii::$app->request->baseUrl . '/' . $row->repair_image; ?>" class="p-image" alt="">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                        <br>

                    <?php endforeach; ?>
                <?php endforeach; ?>

<div class="actions">
    
    <a href="<?php 
    if(Yii::$app->user->identity->user_type<3){
        echo Yii::$app->request->baseUrl . '/defect/update?id=' .  $model->id;
    }else{
        echo Yii::$app->request->baseUrl . '/defect/updates?id=' .  $model->id;
    } ?>" class="btn-get-started">EDIT</a>
    
</div>

<h2><span>CONFIRM REPAIR COMPLETION</span></h2>
            <div class="contentspart contentspart4">
                
                <hr />
                    <br />

                    <h3>ACKNOWLEDGEMENT</h3>
                    <div id="boxshow">
                        <h4>Bootstrap’s form controls expand on our Rebooted form styles</h4>
                        <p>Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.</p>

                        <h4>Bootstrap’s form controls expand on our Rebooted form styles</h4>
                        <p>Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.</p>
                    </div>

                    <br />
                    <br />

                    <h3><input type="checkbox" id="checkboxSuccess" value="option1"> <span>I ACKNOWLEDGE THE PRODUCT REPAIR COMPLETION</span></h3>

                    <div class="error_div"></div>
                    <br />
                    <div class="lastbutton">
                        <button type="submit" class="btn">COMPLETE REPAIR</button>
                    </div>

            </div>






            </div>
        </div>
    </div>
</div>
<div class="actions">
    <a href="<?php echo Yii::$app->request->baseUrl . '/defect/index' ?>" class="btn-get-started">back</a>
    
</div>

