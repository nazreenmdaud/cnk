<?php



namespace app\controllers;



use Yii;

use app\models\Defect;

use app\models\Category;

use app\models\Customer;

use app\models\Product;

use app\models\DefectSearch;

use app\models\DefectDetail;

use app\models\ProductDefectCategory;

use app\models\DefectProduct;

use app\models\EmailLogs;

use app\models\Images;

use yii\web\Controller;

use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use yii\helpers\ArrayHelper;

use Aws\Sns\SnsClient;

/**

 * DefectController implements the CRUD actions for Defect model.

 */

class DefectController extends Controller {



    /**

     * @inheritdoc

     */

    public function behaviors() {

        return [

            'access' => [

                'class' => AccessControl::className(),

                'only' => ['create', 'createdef', 'update', 'addproduct', 'delete', 'view', 'deleteproduct', 'deletedetail', 'adddefect', 'confirm', 'sendemail','uploadimage','deleteimage','sendmessage'],

                'rules' => [

                        [

                        'actions' => ['create', 'createdef', 'update', 'addproduct', 'adddefect', 'delete', 'view', 'deleteproduct', 'deletedetail', 'confirm', 'sendemail','uploadimage','deleteimage','sendmessage'],

                        'allow' => true,

                        'roles' => ['@'],

                    ],

                ],

            ],

            'verbs' => [

                'class' => VerbFilter::className(),

                'actions' => [

                //'logout' => ['post'],

                ],

            ],

        ];

    }



    public function actionDeleteimage()

    {

        // print_r($_POST);

        if(isset($_POST['img']) && $_POST['img'])

                Images::deleteAll('images ="'.$_POST['img'].'"');

        if(isset($_POST['img']) && $_POST['img'] && file_exists(Yii::getAlias('@webroot') . '/uploads/'.$_POST['img']))

            unlink(Yii::getAlias('@webroot') . '/uploads/'.$_POST['img']);

        if(isset($_POST['img']) && $_POST['img'] && file_exists(Yii::getAlias('@webroot') . '/'.$_POST['img']))

            unlink(Yii::getAlias('@webroot') . '/'.$_POST['img']);

    }



    public function actionUploadimage()

    {

        $array['status'] = 0;

        $array['url'] = "";

        $array['path'] = "";

          // print_r($_FILES); die;

        if(isset($_FILES['image']['name']) && $_FILES['image']['name'])

        {

            $ext = 'png';

            $ext1 = 'png';

            if($ext1=='jpg' || $ext1=='png' || $ext1=='gif' ||$ext1=='jpeg'){

                $fileName = md5($_POST['ctime'].'-'.$_POST['img_index']) . "." . $ext;



                if (move_uploaded_file($_FILES['image']['tmp_name'], Yii::getAlias('@webroot') . '/uploads/' . $fileName)) {

                    $array['url'] = Yii::$app->request->baseUrl.'/uploads/' . $fileName.'?'.time();

                    $array['path'] = 'uploads/' . $fileName;

                    $array['image'] = $fileName;

                    $array['status'] = 1;

                    $array['img_index'] = $_POST['img_index'];

                }

            }

        }

        if(isset($_FILES['file']['name']) && $_FILES['file']['name'])

        {

            $ext1 = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            if($ext1=='jpg' || $ext1=='png' || $ext1=='gif' ||$ext1=='jpeg'){

                $fileName = md5($_POST['ctime'].'-'.$_POST['img_index']) . "." . $ext1;



                if (move_uploaded_file($_FILES['file']['tmp_name'], Yii::getAlias('@webroot') . '/uploads/' . $fileName)) {

                    $array['url'] = Yii::$app->request->baseUrl.'/uploads/' . $fileName.'?'.time();

                    $array['path'] = 'uploads/' . $fileName;

                    $array['status'] = 1;

                    $array['image'] = $fileName;

                    $array['img_index'] = $_POST['img_index'];

                }

            }

        }



        echo json_encode($array); die;

    }



    public function actionChangestatus() {

        $status = 0;

        $id = 0;



        if (isset($_REQUEST['id']) && $_REQUEST['id'])

            $id = $_REQUEST['id'];

        if (isset($_REQUEST['status']))

            $status = $_REQUEST['status'];



        if ($id) {

            $model = $this->findModel($id);

            $model->status = $status;

            $model->u_by = Yii::$app->user->identity->id;

            $model->save(false);

        }

    }



    /**

     * Lists all Defect models.

     * @return mixed

     */

    public function actionIndex() {

        $this->layout = 'front';

        $searchModel = new DefectSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [

                    'searchModel' => $searchModel,

                    'dataProvider' => $dataProvider,

        ]);

    }



    /**

     * Lists all Defect models.

     * @return mixed

     */

    public function actionIndex2() {

        $this->layout = 'front';

        $searchModel = new DefectSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index2', [

                    'searchModel' => $searchModel,

                    'dataProvider' => $dataProvider,

        ]);

    }



    /**

     * Displays a single Defect model.

     * @param integer $id

     * @return mixed

     */

    public function actionView($id) {

        $this->layout = 'front';

        $p = DefectProduct::find()->where([  'defect_id' => $id])->all();

        $d = DefectDetail::find()->where([  'defect_id' => $id])->all();

        $model = $this->findModel($id);

        $customer = Customer::findOne($model->customer_id);



        return $this->render('view', [

                    'model' => $model,

                    'customer'=>$customer,

                    'product' => $p,

                    'details' => $d,

        ]);

    }

    public function actionUpdates($id) {

        $this->layout = 'front';

        $p = DefectProduct::find()->where([  'defect_id' => $id])->all();

        $d = DefectDetail::find()->where([  'defect_id' => $id])->all();

        $model = $this->findModel($id);

        $customer = Customer::findOne($model->customer_id);

        if(isset($_POST) && $_POST)

        {

            // print "<pre>";

            // print_r($_POST);die; 

            foreach ($_POST['status'] as $id => $value) {

               $d = Images::find()->where([ 'id' => $id])->one(); 



               if($d)

               {

                 $d->status = $value;

                 // $d->u_by = 

                 $d->what_done_for_repair = $_POST['what_done_for_repair'][$id];

                if(isset($_FILES['repair_image']['name'][$id]) && $_FILES['repair_image']['name'][$id])

                {

                    $ext = pathinfo($_FILES['repair_image']['name'][$id], PATHINFO_EXTENSION);

                    $ext1 = strtolower($ext);

                    if($ext1=='jpg' || $ext1=='png' || $ext1=='gif' ||$ext1=='jpeg'){

                        $fileName = md5(time() . rand()) . "." . $ext;



                        if (move_uploaded_file($_FILES['repair_image']['tmp_name'][$id], Yii::getAlias('@webroot') . '/uploads/' . $fileName)) {

                            $d->repair_image = 'uploads/' . $fileName;

                        }

                    }

                }

                $d->save();

               }

            }

            Yii::$app->session->setFlash('success', "Status has been changed successfully!");



            return $this->redirect(['site/index']);



           

        }

        return $this->render('updates', [

                    'model' => $model,

                    'customer'=>$customer,

                    'product' => $p,

                    'details' => $d,

        ]);

    }



    public function actionAddupdates($id) {

        $this->layout = 'front';



        $d = DefectDetail::find()->where([ 'id' => $id])->one();

        $d->setScenario('add_update');

        if ($d->load(Yii::$app->request->post())) {

//            print_r($_FILES['DefectDetail']['name']['repair_image']); die;

            if (isset($_FILES['DefectDetail']['name']['repair_image']) && $_FILES['DefectDetail']['name']['repair_image']) {

                $ext = pathinfo($_FILES['DefectDetail']['name']['repair_image'], PATHINFO_EXTENSION);

                $fileName = md5(time() . rand()) . "." . $ext;

                if (move_uploaded_file($_FILES['DefectDetail']['tmp_name']['repair_image'], Yii::getAlias('@webroot') . '/uploads/' . $fileName)) {

                    $d->repair_image = 'uploads/' . $fileName;

                }

            }

            Yii::$app->session->setFlash('success', "Status has been changed successfully!");



            $d->save();

            return $this->redirect(['addupdates', 'id' => $id]);

        }

        return $this->render('addupdates', [

                    'model' => $this->findModel($d->defect_id),

                    'details' => $d,

        ]);

    }



    public function actionSendemail($id = 0) {



        $this->layout = 'front';

        $model = new Defect;

        if ($id)

        {

            $model = $this->findModel($id);

            $model->email = $model->customer->email;

        }

        $model2 = new Defect;

        if ($id)

        {

            $model2 = $this->findModel($id);

            $model2->contact = $model2->customer->contact;

        }

        $model->setScenario('email_cus');

        $model2->setScenario('message_cus');

        if ($model->load(Yii::$app->request->post())) {



            $body = $model->email_body;



            Yii::$app->mailer->compose()

                    ->setTo($model->customer->email)

                     ->setFrom(['cnk@webpuppies.me' => 'Charles & Keith'])

                    ->setSubject($model->subject)

                    ->setHtmlBody($body)

                    ->send();



            $m = new EmailLogs;

            $m->subject = $model->subject;

            $m->email = $model->email;

            $m->body = $body;

            $m->status = "Sent";

            $m->initial_date = date('Y-m-d H:i:s');

            $m->save();



            Yii::$app->session->setFlash('success', "Email has been sent successfully!");

            return $this->redirect(['site/index']);

        }







        return $this->render('sendmail', [

                    'model' => $model,

            'model2'=>$model2

        ]);

    }

    public function actionSendmessage($id = 0) {



        $this->layout = 'front';

        $model = new Defect;

        if ($id)

        {

            $model = $this->findModel($id);

            $model->contact = $model->customer->contact;

        }







        if ($model->load(Yii::$app->request->post())) {

            $model->setScenario('message_cus');

          //echo "<pre>";print_r($_POST['Defect']['sms_body']);exit;

            $body = $model->email_body;
            $message = $_POST['Defect']['sms_body'];
            $contact_no = "+65".$_POST['Defect']['contact'];
            //print_r(Yii::$app->request->post('sms_body'));exit;



            //$sns = Yii::$app->awssdk;

            $params = array(

                'credentials' => array(

                    'key' => 'AKIAJBMWZXQULZ6CF56Q',

                    'secret' => '2+MqNOpvcxkBHblBMl9V3N/7Kcu9cViS1bhF+BAH',

                ),

                'region' => 'ap-southeast-1', // < your aws from SNS Topic region

                'version' => 'latest'

            );



           $sns = new SnsClient($params);

            $msgattributes = [

                'AWS.SNS.SMS.SenderID' => [

                    'DataType' => 'String',

                    'StringValue' => 'mySenderID',

                ],

                'AWS.SNS.SMS.SMSType' => [

                    'DataType' => 'String',

                    'StringValue' => 'Transactional',

                ]

            ];

            $SMSattributes = [

                //'DefaultSMSType' => 'Promotional', // If you want all your SMS messages to be sent out by default as promotional you can use the following

                'DeliveryStatusIAMRole' => 'arn:aws:iam::ACCOUNT:role/IAMROLE',

                'DeliveryStatusSuccessSamplingRate' => '100' // to have all your success msgs logged you should have this value at 100% , else as per your requirement you can lower it...

            ];

            
$args = array(
    "SenderID" => "SenderName",
    "SMSType" => "Transactional",
    "Message" => $message,
    "PhoneNumber" => $contact_no
);

            try {

               
                echo "\nPublish Response:\n";



                $result=$sns->publish($args);



                //var_dump($result);





                echo "\nMessage Published Succesfully !! Check your mobile device for the message\n";

                echo "\nFor more detailed logging, check your S3 bucket for the Usage Reports generated.\n*** Note: These reports are generated on a daily basis\n";

            } catch ( Exception $e ) {

                echo "Send Failed!\n" . $e->getMessage();exit;

                //var_dump($result);

            }

            //$result = $sns->publish($args);

            

            Yii::$app->session->setFlash('success', "Message has been sent successfully!");

            return $this->redirect(['site/index']);

        }







        return $this->render('sendmail', [

            'model' => $model,

        ]);

    }

    /**

     * Creates a new Defect model.

     * If creation is successful, the browser will be redirected to the 'view' page.

     * @return mixed

     */

    public function actionCreate() {

        $this->layout = 'front';

        $model = new Defect();

        $modelC=new Customer();



        if(isset($_POST) && $_POST){

              // print "<pre>";

          // print_r($_FILES);

              // print_r($_POST); die;

            $modelC->submission_id=Yii::$app->user->identity->id;

            $modelC->customer_name = $_POST['name'];

            $modelC->email = $_POST['email'];

            $modelC->address = $_POST['address'];

            $modelC->contact = $_POST['contact'];

            $modelC->save();



            $model->customer_id = $modelC->id;

            $model->user_id = Yii::$app->user->identity->id;

            $model->u_by = Yii::$app->user->identity->id;

            $model->initial_date = date ("Y-m-d H:i:s");

            $model->updated_date = date('Y-m-d H:i:s');

            $model->outlet_name = $_POST['Defect']['outlet_name'];

            $model->save();



            $model->defect_no = 1000 + $model->id;

            $model->save();

            

            $body = '<h3>Hello ' .$modelC->customer_name. ',</h3>';

            $body .= '<br>';

            $body .= '<p>The defect for the product has been submitted</p>';

            $body .= '<p>Defect ID:' . $model->defect_no . '</p>';

            



            Yii::$app->mailer->compose('request', ['customer_name' => $modelC->customer_name, 'body' => $body])

                    ->setTo($modelC->email)

                    ->setFrom(['cnk@webpuppies.me' => 'Charles & Keith'])

                    ->setSubject("Defect Submitted Confirmation")

                    // ->setHtmlBody($body)

                    ->send();



            $id = $model->id;

            $arr = $_POST;



            foreach ($arr['products'] as $key => $value) {

                    $ch = DefectProduct::find()->where(['product_id' => $value, 'defect_id' => $id])->one();

                    if ($ch)

                        $p = $ch;

                    else {

                        $p = new DefectProduct;

                        $p->product_id = $value;

                        $pr = Product::findOne($value);

                        $p->product_name = $pr->name;

                        $p->defect_id = $id;

                        $p->articleno = $arr['articleno'][$key];

                        $p->size = $arr['size'][$key];

                        $p->color = $arr['color'][$key];

                        $p->save();

                    }



                    foreach ($arr['category'][$value] as $key1 => $value1) {

                        if ($value1 == "0")

                            continue;

                        $d = new DefectDetail;

                        $d->defect_id = $id;

                        $d->category_id = $value1;

                        $d->defect_product_id = $p->id;

                        $d->defect_type_id = $arr['description'][$value][$key1];

                        $d->notes = $arr['notes'][$value][$key1];



                        if(isset($arr['editedimagename'][$value]) && $arr['editedimagename'][$value]){

                            foreach ($arr['editedimagename'][$value] as $i) {

                                $pi = new Images;

                                $pi->product_id = $value;

                                $pi->defect_id = $id;

                                $pi->images = $i;

                                $pi->save();

                            }

                        }

                        // if(isset($arr['editedimagename'][$value][$key1]) && $arr['editedimagename'][$value][$key1]){

                        //     $d->image = $arr['editedimagename'][$value][$key1];

                        // }

                        // else if(isset($_FILES['image']['name'][$value][$key1]) && $_FILES['image']['name'][$value][$key1])

                        // {

                        //     $ext = pathinfo($_FILES['image']['name'][$value][$key1], PATHINFO_EXTENSION);

                        //     $ext1 = strtolower($ext);

                        //     if($ext1=='jpg' || $ext1=='png' || $ext1=='gif' ||$ext1=='jpeg'){

                        //         $fileName = md5(time() . rand()) . "." . $ext;



                        //         if (move_uploaded_file($_FILES['image']['tmp_name'][$value][$key1], Yii::getAlias('@webroot') . '/uploads/' . $fileName)) {

                        //             $d->image = 'uploads/' . $fileName;

                        //         }

                        //     }

                        // }

                        $d->save();

                    }



         }

         Yii::$app->session->setFlash('success', "Defect submission has been submitted!");

         return $this->redirect(['site/index']);

        

    }

         else {

            return $this->render('create', [

                        'model' => $model,

                        'modelC'=>$modelC

            ]);

        }

    }





    /**

     * Creates a new Defect model.

     * If creation is successful, the browser will be redirected to the 'view' page.

     * @return mixed

     */

    public function actionCreatedef() {

        $this->layout = 'front';

        $model = new Defect();

       



        if(isset($_POST) && $_POST){



            $model->customer_id = $modelC->id;

            $model->user_id = Yii::$app->user->identity->id;

            $model->u_by = Yii::$app->user->identity->id;

            $model->initial_date = date ("Y-m-d H:i:s");

            $model->updated_date = date('Y-m-d H:i:s');

            $model->outlet_name = $_POST['Defect']['outlet_name'];

            $model->save();



            $model->defect_no = 1000 + $model->id;

            $model->save();

            

            $body = '<h3>Hello ' .$modelC->customer_name. ',</h3>';

            $body .= '<br>';

            $body .= '<p>The defect for the product has been submitted</p>';

            $body .= '<p>Defect ID:' . $model->defect_no . '</p>';

            



            $id = $model->id;

            $arr = $_POST;



            foreach ($arr['products'] as $key => $value) {

                    $ch = DefectProduct::find()->where(['product_id' => $value, 'defect_id' => $id])->one();

                    if ($ch)

                        $p = $ch;

                    else {

                        $p = new DefectProduct;

                        $p->product_id = $value;

                        $pr = Product::findOne($value);

                        $p->product_name = $pr->name;

                        $p->defect_id = $id;

                        $p->save();

                    }



                    foreach ($arr['category'][$value] as $key1 => $value1) {

                        if ($value1 == "0")

                            continue;

                        $d = new DefectDetail;

                        $d->defect_id = $id;

                        $d->category_id = $value1;

                        $d->defect_product_id = $p->id;

                        $d->defect_type_id = $arr['description'][$value][$key1];

                        $d->notes = $arr['notes'][$value][$key1];

                        if(isset($arr['editedimagename'][$value][$key1]) && $arr['editedimagename'][$value][$key1]){

                            $d->image = $arr['editedimagename'][$value][$key1];

                        }

                        else if(isset($_FILES['image']['name'][$value][$key1]) && $_FILES['image']['name'][$value][$key1])

                        {

                            $ext = pathinfo($_FILES['image']['name'][$value][$key1], PATHINFO_EXTENSION);

                            $ext1 = strtolower($ext);

                            if($ext1=='jpg' || $ext1=='png' || $ext1=='gif' ||$ext1=='jpeg'){

                                $fileName = md5(time() . rand()) . "." . $ext;



                                if (move_uploaded_file($_FILES['image']['tmp_name'][$value][$key1], Yii::getAlias('@webroot') . '/uploads/' . $fileName)) {

                                    $d->image = 'uploads/' . $fileName;

                                }

                            }

                        }

                        $d->save();

                    }



         }

         Yii::$app->session->setFlash('success', "Defect submission has been submitted!");

         return $this->redirect(['site/index']);

        

    }

         else {

            return $this->render('createdef', [

                        'model' => $model

            ]);

        }

    }





    /**

     * Updates an existing Defect model.

     * If update is successful, the browser will be redirected to the 'view' page.

     * @param integer $id

     * @return mixed

     */

    public function actionUpdate($id) {

        $this->layout = 'front';

        $model = $this->findModel($id);

        $modelC = Customer::findOne([

            'id' => $model->customer_id,  

        ]);



        $p = DefectProduct::find()->where([  'defect_id' => $id])->all();

        $d = DefectDetail::find()->where([  'defect_id' => $id])->all();

        $model = $this->findModel($id);

        $modelC = Customer::findOne($model->customer_id);



        if(isset($_POST) && $_POST){

             // print "<pre>";

          // print_r($_FILES);

             // print_r($_POST); die;

            $modelC->customer_name = $_POST['name'];

            $modelC->email = $_POST['email'];

            $modelC->address = $_POST['address'];

            $modelC->contact = $_POST['contact'];

            $modelC->save();



            $model->u_by = Yii::$app->user->identity->id;

            $model->updated_date = date('Y-m-d H:i:s');

            $model->outlet_name = $_POST['Defect']['outlet_name'];

            $model->save();



            $model->defect_no = 1000 + $model->id;

            $model->save();



            $id = $model->id;

            $arr = $_POST;



            DefectProduct::deleteAll('defect_id ='.$id);

            DefectDetail::deleteAll('defect_id ='.$id);

            Images::deleteAll('defect_id ='.$id);



            foreach ($arr['products'] as $key => $value) {

                    $ch = DefectProduct::find()->where(['product_id' => $value, 'defect_id' => $id])->one();

                    if ($ch)

                        $p = $ch;

                    else {

                        $p = new DefectProduct;

                        $p->product_id = $value;

                        $pr = Product::findOne($value);

                        $p->product_name = $pr->name;

                        $p->defect_id = $id;

                        $p->articleno = $arr['articleno'][$key];

                        $p->size = $arr['size'][$key];

                        $p->color = $arr['color'][$key];

                        $p->save();

                    }



                    foreach ($arr['category'][$value] as $key1 => $value1) {

                        if ($value1 == "0")

                            continue;

                        $d = new DefectDetail;

                        $d->defect_id = $id;

                        $d->category_id = $value1;

                        $d->defect_product_id = $p->id;

                        $d->defect_type_id = $arr['description'][$value][$key1];

                        $d->notes = $arr['notes'][$value][$key1];



                        if(isset($arr['editedimagename'][$value]) && $arr['editedimagename'][$value]){

                            foreach ($arr['editedimagename'][$value] as $i) {

                                $pi = new Images;

                                $pi->product_id = $value;

                                $pi->defect_id = $id;

                                $pi->images = $i;

                                $pi->save();

                            }

                        }



                        // if(isset($arr['editedimagename'][$value][$key1]) && $arr['editedimagename'][$value][$key1]){

                        //     $d->image = $arr['editedimagename'][$value][$key1];

                        // }

                        // else if(isset($_FILES['image']['name'][$value][$key1]) && $_FILES['image']['name'][$value][$key1])

                        // {

                        //     $ext = pathinfo($_FILES['image']['name'][$value][$key1], PATHINFO_EXTENSION);

                        //     $ext1 = strtolower($ext);

                        //     if($ext1=='jpg' || $ext1=='png' || $ext1=='gif' ||$ext1=='jpeg'){

                        //         $fileName = md5(time() . rand()) . "." . $ext;



                        //         if (move_uploaded_file($_FILES['image']['tmp_name'][$value][$key1], Yii::getAlias('@webroot') . '/uploads/' . $fileName)) {

                        //             $d->image = 'uploads/' . $fileName;

                        //         }

                        //     }

                        // }

                        // else if(isset($arr['imagename'][$value][$key1]) && $arr['imagename'][$value][$key1])

                        //     $d->image = $arr['imagename'][$value][$key1];





                        $d->save();

                    }



         }

         Yii::$app->session->setFlash('success', "Defect has been updated!");

         return $this->redirect(['site/index']);

        

    }









        return $this->render('update', [

                    'model' => $model,

                    'customer'=>$modelC,

                    'product' => $p,

                    'details' => $d,

        ]);



    }



    public function actionGetissue() {

        $list = $_REQUEST['product_id'];

        $cat = $_REQUEST['cat_id'];

        $this->layout = false;

        $r = '<option value="">Select Issue</option>';

            

        if($cat){

            $obj = Category::findOne($cat);

            $cat = $obj->main_category;





            $category = ProductDefectCategory::find()->select('prd_defect_category.*')->innerjoin('prd_defect_category', 'prd_defect_category.id=prd_product_defect_category.defect_category_id')

                    ->where(['product_id' => $list, 'main_category' => $cat])

                    ->with('category')

                    ->all();



            foreach ($category as $row) :

                $r .= '<option value="' . $row->id . '">' . $row->name . ' (' . $row->ch_name . ')' . '</option>';

            endforeach;

        }

        echo $r;

        die;

    }



    public function actionGetcategory() {

        $list = $_REQUEST['product_id'];

        $this->layout = 'ajax';

        // echo $list; die;

        $category = ProductDefectCategory::find()->select('prd_defect_category.*')->innerjoin('prd_defect_category', 'prd_defect_category.id=prd_product_defect_category.defect_category_id')

                                        ->where(['product_id' => $list])->groupBy('main_category')

                                        ->with('category')

                                        ->all();



        $r1 = '<option value="">Select Category</option>';

        foreach ($category as $row) :

            $r1 .= '<option value="' . $row->id . '">' . $row->main_category . ' (' . $row->ch_main_category . ')' . '</option>';

        endforeach;



        echo $r1;

        die;

    }



    /**

     * Deletes an existing Defect model.

     * If deletion is successful, the browser will be redirected to the 'index' page.

     * @param integer $id

     * @return mixed

     */

    public function actionDelete($id) {

        $model = $this->findModel($id);

        //$model->deleted = 1;

        //$model->save();

         $this->findModel($id)->delete();



        return $this->redirect(['index']);

    }



    public function actionDeleteproduct($id) {

        $model = DefectProduct::findOne($id);

        $model->deleted = 1;

        $model->save();
        

    }



    public function actionDeletedetail($id) {

        $model = DefectDetail::findOne($id);

        //$model->deleted = 1;



        if ($model->image && file_exists(Yii::getAlias('@webroot') . '/' . $model->image)) {

            unlink(Yii::getAlias('@webroot') . '/' . $model->image);

        }



        $model->save();

    }



    /**

     * Finds the Defect model based on its primary key value.

     * If the model is not found, a 404 HTTP exception will be thrown.

     * @param integer $id

     * @return Defect the loaded model

     * @throws NotFoundHttpException if the model cannot be found

     */

    protected function findModel($id) {

        if (($model = Defect::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }



}

