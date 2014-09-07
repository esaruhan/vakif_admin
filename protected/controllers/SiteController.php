<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//echo Yii::app()->user->id;exit;
		if (Yii::app()->user->isGuest){
			$this->redirect(array('/site/login'));
		}else{
			$this->render('index');
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout ='error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout ='login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render( 'login' , array('model'=>$model));
	}

        public function actionIletisimliste(){
            
            $this->render('iletisimliste');
        }
        public function actionOku($id){
            
            $model = $this->loadContact($id);

            $model->okundu = 1;
            $model->save();
            
            $this->render('oku',array(
			'model'=>$model,
            ));
            
        }
        
        public function loadContact($id)
	{
		$model=  ContactRecord::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	public function actionSearch(){
		if (Yii::app()->user->isGuest)
			$this->redirect('index');
		else
		$this->render('search');
	}
        
        public function actionKurbantakip(){
            
            $posts = Data::getKurbanBagisiYapanlar();
                
            $this->render('kurbantakip',array('posts'=>$posts));    	
        }
        
        public function actionKesim($id){
            
            $model = $this->loadBagisRecord($id);
            
            $this->render('kesim',array(
			'model'=>$model,
            ));
        }
        public function actionKesimyap($id,$tip){
            $model = $this->loadBagisRecord($id);
            
            if($tip == 'sms'){
                if(Util::checkVariableValidity($model->telefon) == false){
                          Yii::app()->user->setFlash('error', 'Bağışcı telefon bilgisini vermemiştir. SMS gönderemezsiniz. ');
                }
            } else if($tip == 'mail' ){
                if(Util::checkVariableValidity($model->email) == false){
                          Yii::app()->user->setFlash('error', 'Bağışcı e-posta bilgisi  vermemiştir. Mail gönderemezsiniz. ');
                }
            }
            
            $this->render('kesimyap',array(
			'model'=>$model,
                        'tip'=>$tip
            ));
        }
                
           public function loadBagisRecord($id)
	{
		$model= BagisRecord::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Böyle bir Bağışçı Bulunamadı.');
		return $model;
	}
        
        
}