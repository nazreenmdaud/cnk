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
use yii\widgets\ActiveForm;
use app\models\ProductDefectCategory;

// $p = Product::find()->where(['deleted'=>0])->all();
$products = $p = Product::find()->all();

$name_array = ArrayHelper::map($products, 'id', 'name');
$ch_name_array = ArrayHelper::map($products, 'id', 'ch_name');

$temp = 0;

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
    .modal{
        z-index: 105000000 !important;
    }
    .product-preview .col-sm-3{
       height: 150px;
       overflow: hidden;
    }
    .img-div{
        height: 100px;
        /*width: 100%;*/
    }

    .product-preview,
    .product-file{
        margin-bottom: 10px;
    }
    .product-preview button{
        margin-top: 5px;
        margin-bottom: 10px;
        
    }


.signature-pad {
  width:400px;
  height:200px;
}



</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css" rel="stylesheet" />
<h1>EDIT SUBMISSION <?php echo $model->defect_no; ?></h1>
<script type="text/javascript">

    // $(document).ready(()=>{
    var canvas, ctx;
    var img_arr = Array();
    $('body').on('click', '.edit', function () {
        index = $(this).attr('data-i-index');
        if (img_arr[index] != undefined && img_arr[index] != '')
        {
            $('#clear').attr('data-i-index', index);
            $('#save-btn').attr('data-id', index);
            loadCanvas(img_arr[index]);
            setTimeout(function () {
                canvas.setAttribute('height', $(canvasDiv).outerHeight());
                canvas.setAttribute('width', $(canvasDiv).width());

                var imageObj = new Image();
                imageObj.onload = function () {
//                    console.log("called");
                    context.drawImage(this, 0, 0, context.canvas.width, context.canvas.height);
                };

                imageObj.src = img_arr[index];


                var signaturePad = new SignaturePad(document.getElementById('canvas'), {
                  backgroundColor: 'rgba(255, 255, 255, 0)',
                  penColor: '#FF0000'
                });

            }, 601)



        }
    })

    function loadCanvas(dataURL) {

        // load image from data url


        var canvasDiv = document.getElementById('canvasDiv');
        if ($('#canvas').length > 0)
            $('#canvas').remove();

        canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);


        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        ctx = context = canvas.getContext("2d");

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

}




        

</script>


<?php /* $form = ActiveForm::begin(

  [
  // 'enableAjaxValidation' => true,
  'options' => [
  'class' => 'form-horizontal form-bordered','enctype' => 'multipart/form-data',
  ],'fieldConfig' => [
  'template' => "{label}\n<div class=\"col-xs-6\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
  'labelOptions' => ['class' => 'col-xs-12'],
  ]]); */ ?>

<script>
    var img_arr = Array();
</script>

<form id='new_submission_form' method="post" enctype="multipart/form-data">
    <input id="ctoken" type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
    <div class="container">
        <div class="row">
            <div class="accordions">
                <h2 id="h21"> <span>CUSTOMER INFORMATION</span></h2>
                <div class="contentspart" id="1">


                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer->customer_name; ?>" name="name" class="form-control cust_required" id="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" value="<?php echo $customer->email; ?>" name="email" class="form-control cust_required" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer->address; ?>" name="address" class="form-control" id="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo $customer->contact; ?>" name="contact" class="form-control cust_required" id="contact" placeholder="Contact">
                        </div>
                    </div>
                    <!-- </form> -->

                </div>
                <h2 id="h22"><span>PRODUCTS</span></h2>
                <div class="contentspart product-div" id="2">
                    <?php foreach ($product as $k => $list): ?>
                        <div class="product-section ps<?=$k?>">
                        <div class="form-group row" data-index="<?= $k ?>">
                            <div class="col-sm-8">
                                <select name="products[]" class="form-control productid cust_required">
                                    <option value="">Select</option>
                                    <?php foreach ($products as $row) : ?>
                                        <option <?php if ($row->id == $list->product_id) echo "selected"; ?> value="<?= $row->id ?>"><?= $row->name ?> (<?= $row->ch_name ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php if ($k == 0): ?>
                                <div class="col-sm-2">                        
                                    <button type="button" class="add-product btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Add New Product </button>
                                </div>
                            <?php else: ?>
                                <div class="col-sm-2">                        
                                    <button type="button" class="remove-product btn btn-primary"><span class="glyphicon glyphicon-minus"></span> Remove Product </button>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Article No</label>
                            <div class="col-sm-8">
                                <input type="text" name="articleno[]" class="form-control articleno cust_required" id="articleno" placeholder="Article No" value="<?php echo $list->articleno?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Size</label>
                            <div class="col-sm-8">
                                <input type="text" name="size[]" class="form-control size cust_required" id="size" placeholder="e.g. 35, 36, etc" value="<?php echo $list->size?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Color</label>
                            <div class="col-sm-8">
                                <input type="text" name="color[]" class="form-control color cust_required" id="color" placeholder="e.g. Red, Blue, Green, etc" value="<?php echo $list->color?>">
                            </div>
                        </div>

                        </div>

                    <?php endforeach; ?>
                </div>
                <h2 id="h23"> <span>DEFECTS</span></h2>
                <div class="contentspart defect-div" id="3">
                    <?php 

                    $ct = 0;

                    foreach ($product as $k => $list): ?>
                        <div class="defect<?= $k ?> defect-subdiv" data-pid="<?php echo $list->product_id;?>" data-index="<?= $k ?>">
                            <?php
                            $d = DefectDetail::find()->where(['defect_id' => $list->defect_id, 'defect_product_id' => $list->id])->all();
                            $category = ProductDefectCategory::find()->select('prd_defect_category.*')->innerjoin('prd_defect_category', 'prd_defect_category.id=prd_product_defect_category.defect_category_id')
                                    ->where(['product_id' => $list->product_id])->groupBy('main_category')
                                    ->with('category')
                                    ->all();
                            ?>
                            <?php
                            foreach ($d as $k1 => $list1):

                                $obj = Category::findOne($list1->category_id);
                                $cat = $obj->main_category;


                                $subcategory = ProductDefectCategory::find()->select('prd_defect_category.*')->innerjoin('prd_defect_category', 'prd_defect_category.id=prd_product_defect_category.defect_category_id')
                                        ->where(['product_id' => $list->product_id, 'main_category' => $cat])
                                        ->with('category')
                                        ->all();


                                $i = Images::find()->where(['product_id' => $list->product_id, 'defect_id' => $list->defect_id])->all();                                       


                                // print_r($subcategory); die;       
                                ?>
                                <div class="subdefect" subdefect-id="<?php
                                echo $temp;
                                
                                ?>">
                                    <h3>Product Name : <span>
                                        <?php echo $name_array[$list->product_id]; ?> (<?php echo $ch_name_array[$list->product_id]; ?>)</span>
                                    </h3>
                                    <div class="product-file"></div>
                                    <div class="product-preview">
                                    <?php foreach($i as $row): ?>
                                        <div class="col-sm-3 idiv<?php echo $list->product_id;?>">
                                        <img class="img-div edid0" src="<?php echo Yii::$app->request->baseUrl ?>/<?php echo $row->images;?>">
                                        <div class="clearfix"></div>
                                        <button data-i-index="<?php echo $ct;?>" type="button" class="edit btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Edit Image</button>&nbsp; &nbsp; 
                                        <button data-src="<?php echo $row->images;?>" data-i-index="<?php echo $ct;?>" type="button" class="remove-image btn-sm btn-primary">Remove</button>
                                        <input class="edimage<?php echo $ct;?>" type="hidden" value="<?php echo $row->images;?>" name="editedimagename[<?php echo $list->product_id;?>][]">
                                        </div>
                                        <script>
                                            img_arr[<?php echo $ct ?>] = "<?php echo Yii::$app->request->baseUrl . '/' . $row->images; ?>";
                                        </script>
                                    <?php 
                                    $ct++;
                                    endforeach; ?>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <?php if ($list1->image): ?>
                                                <img src="<?php echo Yii::$app->request->baseUrl . '/' . $list1->image; ?>" class="p-image" alt="">
                                                <script>
                                                    img_arr[<?php echo $ct ?>] = "<?php echo Yii::$app->request->baseUrl . '/' . $list1->image; ?>"
                                                </script>
                                            <?php 
                                            $ct++; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="hidden" value="<?php echo $list1->id ?>"  name="dp[<?php echo $list->product_id ?>][]">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <select data-id="1" class="form-control category cust_required" name="category[<?php echo $list->product_id ?>][]">
                                                <?php foreach ($category as $row) : ?>
                                                    <option <?php if ($row->id == $list1->category_id) echo "selected"; ?> value="<?= $row->id ?>"><?= $row->main_category ?> (<?= $row->ch_main_category ?>)</option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <select class="form-control description cust_required" name="description[<?php echo $list->product_id ?>][]">
                                                <?php foreach ($subcategory as $row1) : ?>
                                                    <option <?php if ($row1->id == $list1->defect_type_id) echo "selected"; ?> value="<?= $row1->id ?>"><?= $row1->name ?>(<?= $row->ch_name ?>)</option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="notes[<?php echo $list->product_id ?>][]" rows="" placeholder="Note"><?php echo $list1->notes; ?></textarea>
                                        </div>
                                    </div>
                                    <?php if ($k1 == 0): ?>
                                        <div class="form-group row hidden">
                                            <div class="col-sm-10">
                                                <button data-id="<?= $list->product_id ?>" data-name="<?php echo $name_array[$list->product_id]; ?> (<?php echo $ch_name_array[$list->product_id]; ?>)" type="button" class="btn btn-success add-new-defect" ><span class="glyphicon glyphicon-plus"></span> Add New Defect </button>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button data-id="<?= $list->product_id ?>" data-name="<?php echo $name_array[$list->product_id]; ?> (<?php echo $ch_name_array[$list->product_id]; ?>)" type="button" class="btn btn-danger remove-defect" ><span class="glyphicon glyphicon-minus"></span> Remove</button>
                                            </div>
                                        </div>
                                    <?php endif; ?>    
                                </div>
                            <?php
                            $temp++;
                            endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div> 
                <h2 id="h24"><span>SUBMISSION SUMMARY</span></h2>
                <div class="contentspart contentspart4" id="4">
                    <br>
                    <br>

                    <h3><span>NAME</span> : <span class="cname"><?php echo $customer->customer_name; ?></span></h3>
                    <h3><span>EMAIL</span> : <span class="cemail"><?php echo $customer->email; ?></span></h3>
                    <h3><span>ADDRESS</span> : <span class="caddress"><?php echo $customer->address; ?></span></h3>
                    <h3><span>CONTACT</span> : <span class="ccontact"><?php echo $customer->contact; ?></span></h3>

                    <br>
                    <hr>

                    <div class="initial_display">
                        <?php
                        $temp1 = 0;
                        foreach ($product as $list):
                            $d = DefectDetail::find()->where(['defect_id' => $list->defect_id, 'defect_product_id' => $list->id])->all();
                            $category = ProductDefectCategory::find()->select('prd_defect_category.*')->innerjoin('prd_defect_category', 'prd_defect_category.id=prd_product_defect_category.defect_category_id')
                                    ->where(['product_id' => $list->product_id])->groupBy('main_category')
                                    ->with('category')
                                    ->all();
                            ?>
                            <?php
                            foreach ($d as $list1):

                                
                                ?>

                                <?php if ($list1->image): ?>
                                    <img  src="<?php echo Yii::$app->request->baseUrl . '/' . $list1->image; ?>" class="p-image edid<?= $temp1 ?>" alt="">
                                    <button data-i-index="<?= $temp1 ?>" type="button" class="edit btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Edit Image</button>
                                    <input class="edimage<?= $temp1 ?>" type="hidden" value="<?= $list1->image ?>" name="editedimagename[<?php echo $list->product_id ?>][]">

                                <?php endif; ?>
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
                                <h3><span>COLORS</span> : <?php echo $list->color; ?></h3>

                                <?php 
                                $temp1++;
                                endforeach; ?>

                                <?php endforeach; ?>

                                <?php
                    $ot = ArrayHelper::map(Outlet::find()->asArray()->all(), 'name', 'name');
                    ?>                
                    <div class="form-group">
                        <!--<label for="inputPassword" class="col-sm-2 control-label">OUTLET</label>-->
                        <h3><span>OUTLET</span> : </h3>
                        
                            <select class="form-control bottom-margin" name="Defect[outlet_name]">
                                <?php foreach ($ot as $l): ?>
                                    <option <?php if ($l == $model->outlet_name) echo "selected"; ?> value="<?php echo $l; ?>"><?php echo $l; ?></option>
                                <?php endforeach; ?>
                            </select> 
                        

                    </div>
                     
                    </div>
                    <br />
                    <hr>
                    
                    <div class="error_div"></div>
                    <br />
                    <div class="lastbutton">
                        <button type="submit" class="btn">UPDATE</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <a href="<?php echo Yii::$app->request->baseUrl . '/defect/index' ?>" class="btn-get-started">BACK</a>
        
    </div>

</form>

<?php //ActiveForm::end();   ?>
<script type="text/javascript">

    var iindex = "<?php echo $ct;?>";
    function b64toBlob(b64Data, contentType, sliceSize) {
        contentType = contentType || '';
        sliceSize = sliceSize || 512;

        var byteCharacters = atob(b64Data);
        var byteArrays = [];

        for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
            var slice = byteCharacters.slice(offset, offset + sliceSize);

            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }

            var byteArray = new Uint8Array(byteNumbers);

            byteArrays.push(byteArray);
        }

        var blob = new Blob(byteArrays, {type: contentType});
        return blob;
    }

    function save() {
        // document.getElementById("canvasimg").style.border = "2px solid";
        canvas = document.getElementById("canvas");
        var ImageURL = canvas.toDataURL();

        var img_index = $('#save-btn').attr('data-id');

        var block = ImageURL.split(";");
        // Get the content type of the image
        var contentType = block[0].split(":")[1];// In this case "image/gif"
        // get the real base64 content of the file
        var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."

        // Convert it to a blob to upload
        var blob = b64toBlob(realData, contentType);
        var form = document.getElementById("myAwesomeForm");
        // Create a FormData and append the file with "image" as parameter name
        var formDataToUpload = new FormData(form);
        formDataToUpload.append("image", blob);
        formDataToUpload.append("_csrf", $('#csrf').val());
        formDataToUpload.append("ctime", $('#ctime').val());
        formDataToUpload.append("img_index", img_index);


        $.ajax({
            url: "<?php echo Yii::$app->request->baseUrl ?>/defect/uploadimage",
            data: formDataToUp
            
            load, // Add as Data the Previously create formData
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json", // Change this according to your response from the server.
            error: function (err) {
                console.error(err);
            },
            success: function (data) {
                console.log(data);
                console.log(img_index);
                if (data.status == '1') {
                    img_arr[img_index] = data.url;
                    $('.edid' + img_index).attr('src', data.url);
                    $('.edimage' + img_index).val(data.path);
                    $('#myModal').modal('hide');
                    generate_initial_display();
                }
            },
            complete: function () {
                console.log("Request finished.");
            }
        });


        // console.log('clicked');
        // document.getElementById("canvasimg").src = dataURL;



        // document.getElementById("canvasimg").style.display = "inline";
    }

    $('body').on('click', '.remove-image', function () {
        if(confirm('Are you sure want to delete this image?')){
                $this = $(this);
                console.log($('#ctoken').val());
                $.ajax({
                    url: "<?php echo Yii::$app->request->baseUrl ?>/defect/deleteimage",
                    data: {_csrf:$('#ctoken').val(),img:$(this).attr('data-src')}, // Add as Data the Previously create formData
                    type: "POST",
                    // dataType: "json", // Change this according to your response from the server.
                    error: function (err) {
                        console.error(err);
                    },
                    success: function (data) {
                        
                        $this.closest('.col-sm-3').remove();
                        generate_initial_display();
                    },
                    complete: function () {
                        console.log("Request finished.");
                    }
                });
        }
    });
    

    var required_message = "This field is required";
    $('#new_submission_form').submit(function () {
        $('.errorMessage').remove();
        first_area = '';

        var error = 0;
        text = '';
        $('body').find('form').find('.cust_required').each(function () {
            if ($.trim($(this).val()) == '')
            {
                $(this).after('<div class="errorMessage">' + required_message + '</div>');
                error++;
                //if (first_area == '')
                //{
                first_area = $(this).closest('.contentspart').attr('id');
                if (text.indexOf($('#h2' + first_area).find('a').find('span').html()) >= 0)
                {

                } else
                    text += $('#h2' + first_area).find('a').find('span').html() + ', ';
                //}
            }
        });

        text = text.replace(/, +$/, '');

        if (!$('#checkboxSuccess').is(':checked'))
        {
            // $('#checkboxSuccess').closest('h3').append('<div class="errorMessage" style="font-size:14px;">'+required_message+'</div>');
            // error++;
        }
        // console.log("hi"+error);
        if (error > 0)
        {

            if ($.trim(text) != "")
                $('.error_div').html('Error in section : ' + text)
            return false;
        }
    });

    $('body').on('change', '.cust_required', function () {
        $(this).siblings('.errorMessage').remove();
        if ($.trim($(this).val()) == '')
        {
            $(this).after('<div class="errorMessage">' + required_message + '</div>');
        }
    });

    $('body').on('focusout', '.cust_required', function () {
        $(this).siblings('.errorMessage').remove();
        if ($.trim($(this).val()) == '')
        {
            $(this).after('<div class="errorMessage">' + required_message + '</div>');
        }
    });

    $(document).ready(function () {

        generate_initial_display();
        Dropzone.autoDiscover = false;

        $('.defect-subdiv').each(function(){

        $(this).find('.product-file').addClass('dropzone');
        $(this).find('.product-file').addClass('dropzone-previews');
        var productid  = $(this).attr('data-pid');
                  
                    var dropzone_div = $(this).find('.product-file')[0];

                    $this = $(this);
                    
                  $(this).find('.product-file').dropzone({ url: "<?php echo Yii::$app->request->baseUrl ?>/defect/uploadimage" ,
                    init: function() {
                    this.on("sending", function(file, xhr, formData) {
                            formData.append("_csrf", $('#csrf').val());
                            formData.append("ctime", $('#ctime').val());
                            formData.append("img_index", iindex);
                            iindex++;
                    });
                    this.on("queuecomplete", function () {
                        this.removeAllFiles();
                        generate_initial_display();
                    });
                    this.on("complete", function(data,xhr) {
                            // console.log(data.xhr.response);
                            //console.log();
                            // this.removeFile(file);
                            var s = jQuery.parseJSON(data.xhr.response);
                            //console.log(s);
                            if(s.status=="1"){
                                
                                img_arr[s.img_index] = s.url;

                                index = s.img_index;

                                img = '<div class="col-sm-3 idiv' + productid + '"><img class="img-div edid' + index + '" src ="' + img_arr[index] + '"><div class="clearfix"></div>';
                                img += '<button data-i-index=' + index + ' type="button" class="edit btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Edit Image</button>';
                                img += '<button  data-src ="' + s.image + '" data-i-index=' + index + ' type="button" class="remove-image btn-sm btn-primary">Remove</button>'
                                img += '<input class="edimage' + index + '" type="hidden" value="'+s.path+'"  name="editedimagename[' + productid + '][]"></div>';

                                  $(this.clickableElements[0].closest('.subdefect')).find('.product-preview').append(img);



                            }

                    });

                  }

                    });

});


        count = parseInt(<?php echo count($product) ?>)+1;
        $('body').on('click', '.add-product', function () {
            var h = $('.p').html().replace('data-index="0"', 'data-index="' + count + '"').replace('ps0','ps'+count);
            $('.product-div').append(h);
            count++;
        });
        $('body').on('click', '.remove-product', function () {

            var did = $(this).closest('.row').attr('data-index');
            $(this).closest('.product-section').remove();
            $('.defect-div .defect' + did).remove();
            generate_initial_display();
        });

        temp = <?php echo $temp+1 ?>;
        $('body').on('change', '.productid', function () {
            var productid = $(this).val();
            var count2 = $(this).closest('.row').attr('data-index');
            var pname = $(this).find('option:selected').text();
            var str = $('.d').html();
            var d = str.replace('defect0', 'defect' + count2).replace('data-index="0"', 'data-index="' + count2 + '"').replace('Product Name', 'Product Name <span>' + pname + '</span>').replace('[0]', '[' + $(this).val() + ']').replace('[0]', '[' + $(this).val() + ']').replace('[0]', '[' + $(this).val() + ']').replace('[0]', '[' + $(this).val() + ']').replace('data-id="0"', 'data-id="' + productid + '"').replace('data-id="0"', 'data-id="' + productid + '"').replace('data-name="0"', 'data-name="' + pname + '"').replace('subdefect-id="0"', 'subdefect-id="' + temp + '"');
            temp++;
            // console.log(str);
            if ($('.defect-div .defect' + count2).length > 0) {
                $('.defect-div .defect' + count2).html("");
                $('.defect-div .defect' + count2).html(d);
                $this = $('.defect-div .defect' + count2);
                $this.find('.category').html("");
                $this.find('.description').html("");
            } else {
                $('.defect-div').append(d);
            }

            $('.defect-div .defect' + count2).find('.product-file').addClass('dropzone');
                  $('.defect-div .defect' + count2).find('.product-file').addClass('dropzone-previews');
                  
                    var dropzone_div = $('.defect-div .defect' + count2).find('.product-file')[0];
                    
                  $('.defect-div .defect' + count2).find('.product-file').dropzone({ url: "<?php echo Yii::$app->request->baseUrl ?>/defect/uploadimage" ,
                    init: function() {
                    this.on("sending", function(file, xhr, formData) {
                            formData.append("_csrf", $('#csrf').val());
                            formData.append("ctime", $('#ctime').val());
                            formData.append("img_index", iindex);
                            iindex++;
                    });
                    this.on("queuecomplete", function () {
                        this.removeAllFiles();
                        generate_initial_display();
                    });
                    this.on("complete", function(data,xhr) {
                            // console.log(data.xhr.response);
                            // this.removeFile(file);
                            var s = jQuery.parseJSON(data.xhr.response);
                            // console.log(s);
                            if(s.status=="1"){
                                img_arr[s.img_index] = s.url;

                                index = s.img_index;

                                img = '<div class="col-sm-3 idiv' + productid + '"><img class="img-div edid' + index + '" src ="' + img_arr[index] + '"><div class="clearfix"></div>';
                                img += '<button data-i-index=' + index + ' type="button" class="edit btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Edit Image</button>';
                                img += '<button  data-src ="' + s.image + '" data-i-index=' + index + ' type="button" class="remove-image btn-sm btn-primary">Remove</button>'
                                img += '<input class="edimage' + index + '" type="hidden" value="'+s.path+'"  name="editedimagename[' + productid + '][]"></div>';

                                // console.log(img);
                                // 

                                 $('.defect-div .defect' + count2).find('.product-preview').append(img);



                            }

                    });

                  }

                    });



            $this = $('.defect-div .defect' + count2);

            $.ajax({
                method: "GET",
                data: {product_id: productid},
                url: "<?php echo Yii::$app->request->baseUrl . '/defect/getcategory' ?>",
                success: function (data) {
                    // alert(data);
                    // $this.find('.category').html("");
                    $this.find('.category').html(data);
                }
            });
            // console.log($this);

        });

        $('body').on('change', '.category', function () {
            $this = $(this);
            var id = $this.attr('data-id');
            $.ajax({
                method: "GET",
                data: {product_id: id, cat_id: $this.val()},
                url: "<?php echo Yii::$app->request->baseUrl . '/defect/getissue' ?>",
                success: function (data) {
                    $this.closest('.subdefect').find('.description').html(data);
                }
            });

        });
        $('body').on('click', '.remove-defect', function () {
            $(this).closest('.subdefect').remove();
        });
        $('body').on('click', '.add-new-defect', function () {
            var content = $('.d1').html();
            var productid = $(this).attr('data-id');
            console.log(productid);
            count1 = $(this).closest('.defect-subdiv').attr('data-index');

            // var name = $('.product-div').closest('.row').attr('data-index');

            pname = $(this).attr('data-name');
            var d = content.replace('Product Name', 'Product Name <span>' + pname + '</span>').replace('[0]', '[' + productid + ']').replace('[0]', '[' + productid + ']').replace('[0]', '[' + productid + ']').replace('[0]', '[' + productid + ']').replace('data-id="0"', 'data-id="' + productid + '"').replace('data-id="0"', 'data-id="' + productid + '"').replace('subdefect-id="0"', 'subdefect-id="' + temp + '"');
            temp++;

            $(this).closest('.defect-subdiv').append(d);

            $this = $('.defect-div .defect' + count1).find('.subdefect').last();
            $.ajax({
                method: "GET",
                data: {product_id: productid},
                url: "<?php echo Yii::$app->request->baseUrl . '/defect/getcategory' ?>",
                success: function (data) {
                    // alert(data);
                    $this.find('.category').html(data);
                }
            });

            console.log(content);





        });
    });

    function generate_initial_display()
    {
        $('.initial_display').html('');
        final_html = '';
        $('.defect-div .subdefect').each(function () {
            index = $(this).attr('subdefect-id');
            img = '';

            pid = $(this).find('.btn').attr('data-id');
            // if (img_arr[index] != undefined && img_arr[index] != '')
            // {
            //     img += '<img class="img-div edid' + index + '" src ="' + img_arr[index] + '">';
            //     img += '<button data-i-index=' + index + ' type="button" class="edit btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Edit Image</button>'
            //     img += '<input class="edimage' + index + '" type="hidden" value=""  name="editedimagename[' + pid + '][]">';
            // }
            $('.idiv'+pid).each(function(){
                var i_src = $(this).find('img').attr('src');
                img += '<div class="col-sm-3"><img class="img-div" src ="' + i_src + '"></div>';

            });
            img += '<div class="clearfix"></div>';



            product_name = $.trim($(this).find('h3').find('span').html());
            category_text = '';

            if ($(this).find('.category').val())
            {
                //alert($(this).find('.category').find('option:selected').html());
                category_text += $(this).find('.category').find('option:selected').html();
            }

            if ($(this).find('.description').val())
            {
                //alert($(this).find('.description').val());
                //alert($(this).find('.description').find('option:selected').html());
                category_text += ' ' + $(this).find('.description').find('option:selected').html();
            }

            //final_html += '<div class="cust-item">' + img + '<br><h3><span>PRODUCT</span> : ' + product_name + '</h3><h3><span>DEFECTS</span> : ' + category_text + '</h3></div>';
            articleno = $('.ps'+index).find('.articleno').val();
            size = $('.ps'+index).find('.size').val();
            color = $('.ps'+index).find('.color').val();


            final_html += '<div  class="cust-item">' + img + '<br><h3><span>PRODUCT</span> : ' + product_name + '</h3><h3><span>DEFECTS</span> : ' + category_text + '</h3>'+
                '<h3><span>ARTICLE NO</span> : ' + articleno + '</h3>'+
                '<h3><span>SIZE</span> : ' + size + '</h3>'+
                '<h3><span>COLOR</span> : ' + color + '</h3>'+
            '</div>';


        });

        $('.initial_display').html(final_html);
    }

    $('body').on('change', '.subdefect select', function () {
        generate_initial_display();
    });

    $('body').on('change', '.product-section input', function () {
        generate_initial_display();
    });

    $('body').on('change', '.subdefect input', function () {
        setTimeout(function () {
            generate_initial_display();
        }, 500);
    });
//    console.log(img_arr);

    function readURL(input, index) {
        // console.log('a');
        // // $("input.files[0]").fileReader({
        // //     filereader: "<?php echo Yii::$app->request->baseUrl; ?>/front/js/filereader.swf"
        // // });
        // // $('input.files[0]').fileReader();
        // if (input.files && input.files[0]) {
        //     console.log('b');
        //     var reader = new FileReader();
        //     reader.onload = function (e) {
        //         console.log('c');
        //         //img_arr.push(e.target.result);
        //         img_arr[index] = e.target.result;
        //         console.log("Im am in");
        //         // console.log(img_arr);
        //     }
        //     console.log(img_arr);
        //     // console.log(reader.readAsBinaryString(input.files[0]).length);
        //     reader.readAsDataURL(input.files[0]);

        // }
    }

    // $('body').on("change", "input[type='file']", function () {
    //     if ($(this).val() != '')
    //     {
    //         readURL(this, $(this).closest('.subdefect').attr('subdefect-id'));
    //     } else
    //     {
    //         img_arr[$(this).closest('.subdefect').attr('subdefect-id')] = '';
    //     }
    // });

    $('body').on('change', '#name', function () {
        $('.cname').text($(this).val());
    });
    $('body').on('change', '#email', function () {
        $('.cemail').text($(this).val());
    });
    $('body').on('change', '#address', function () {
        $('.caddress').text($(this).val());
    });
    $('body').on('change', '#contact', function () {
        $('.ccontact').text($(this).val());
    });
</script>
<div class="p hidden">
    <div class="product-section ps0">
    <div class="form-group row" data-index="0">
        <div class="col-sm-8">
            <!-- <input type="text" class="form-control" placeholder="BELT[XXXX]"> -->
            <select name="products[]" class="form-control productid cust_required">
                <option value="">Select</option>
                <?php foreach ($products as $row) : ?>
                    <option value="<?= $row->id ?>"><?= $row->name ?> (<?= $row->ch_name ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm-2">                        
            <button type="button" class="remove-product btn btn-danger" ><span class="glyphicon glyphicon-minus"></span> Remove Product </button>
        </div>
    </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Article No</label>
            <div class="col-sm-8">
                <input type="number" name="articleno[]" class="form-control articleno cust_required" id="articleno" placeholder="Article No">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Size</label>
            <div class="col-sm-8">
                <input type="number" name="size[]" class="form-control size cust_required" id="size" placeholder="e.g. 35, 36, etc">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Color</label>
            <div class="col-sm-8">
                <input type="text" name="color[]" class="form-control color cust_required" id="color" placeholder="e.g. Red, Blue, Green, etc">
            </div>
        </div>
    </div>
</div>

<div class="d hidden">
    <div class="defect0 defect-subdiv" data-index="0">
        <div class="subdefect" subdefect-id="0">
            <h3>Product Name</h3>
            <div class="product-file"></div>
            <div class="product-preview"></div>
        
            <div class="form-group row">
                <div class="col-sm-10">
                    <select data-id="0" class="form-control category cust_required" name="category[0][]" >
                        <option>Select Category</option>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <select class="form-control description cust_required" name="description[0][]">

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <textarea class="form-control" name="notes[0][]" rows="" placeholder="Note"></textarea>
                </div>
            </div>
            <div class="form-group row hidden">
                <div class="col-sm-10">
                    <button data-id="0" data-name="0" type="button" class="btn btn-success add-new-defect" ><span class="glyphicon glyphicon-plus"></span> Add New Defect </button>
                </div>
            </div>
        </div>    
    </div>
</div>

<div class="d1 hidden">
    <div class="subdefect" subdefect-id="0">
        <h3>Product Name</h3>
        <div class="product-file"></div>
        <div class="product-preview"></div>
        <div class="form-group row">
            <div class="col-sm-10">
                <select data-id="0" class="form-control category cust_required" name="category[0][]" >
                    <option>Select Category</option>

                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <select class="form-control description cust_required" name="description[0][]">

                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <textarea class="form-control cust_required" name="notes[0][]" rows="" placeholder="Note"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button data-id="0" type="button" class="btn btn-danger remove-defect" ><span class="glyphicon glyphicon-minus"></span> Remove </button>
            </div>
        </div>
    </div>    
</div>

