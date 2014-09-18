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

            if( $model->okundu == 2) {
                $model->okundu = 1;
                $model->okuyan_admin_id = Yii::app()->user->id;
                $model->save();
            }
            
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
            
            $posts = Data::getKurbanBagisiYapanlarveKesimOlmayanlar();
                
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
        
        public function actionMailgonderme($id,$tip){
            $model = $this->loadContactRecord($id);
            
            if( $model == null){
                  Yii::app()->user->setFlash('error', 'İletişime geçen kişi bulunamamıştır. Bir hata oluşmuş olabilir.');
          
            } else if(Util::checkVariableValidity($model->mail) == false){
                  Yii::app()->user->setFlash('error', 'İletişime yazan kişinin e-posta bilgisi bulunamamıştır. Mail gönderemezsiniz. ');
            } 
            
            $this->render('mailgonder',array(
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
          public function loadContactRecord($id)
	{
		$model= ContactRecord::model()->findByPk($id);
		
                if($model===null)
			return null;
                
		return $model;
	}
        public function actionMailgonder($id){
                date_default_timezone_set('Europe/Istanbul');
                $model    = $this->loadBagisRecord($id);
                $sms_message  = Util::createSMSMessage($model->ad_soyad, $model->kurban_adet, Data::getBagisTipi($model->bagis_tip));
                $message  = $_POST['message'];
                $telefon  = $model->telefon;
                $smsDurum = 0;
                $image    = "";
                $url_mail = "";
                $url_canli= "";
                
                $image = CUploadedFile::getInstanceByName('camera_tek');
                
//                $url_test =  '/Users/ertugrulsaruhan/Sites/mobile-yiirisma/img/'.$model->id.'_'.$model->image->getName();
                
                
                if(!is_null($image) && is_object($image)){
                    $uniqueId = Util::generateRandomId();
                    $url_canli = '/home/tarifeon/public_html/kurban_admin_yiirisma/img/kurban_images/'.$model->id.'_'.date('Y-m-d').'_'.$uniqueId.'.'.$image->getExtensionName();
                    $url_mail =  '/img/kurban_images/'.$model->id.'_'.date('Y-m-d').'_'.$uniqueId.'.'.$image->getExtensionName();
                    
                    if(file_exists($url_canli)==true){
                        unlink($url_canli);
                    }

                    $image->saveAs($url_canli);
                    $model->kurban_resim_url    = $url_canli;
                    
                } else {
                     $url_canli = null;
                     $url_mail  = null;
                }
              
                if (( isset($telefon) == 1) && ( empty($telefon) != 1)) {
                        $smsSend = $this->smsGonder($model->id, $sms_message, $telefon);
                        $smsDurum = $smsSend->durum;
                }
                
                $mail = new YiiMailer();
                $mail->setData(array('message' => $message, 'name' => $model->ad_soyad,'kurban_image'=>$url_mail));
                $mail->setLayout('vakif');
                $mail->setFrom('info@suleymaniyevakfi.com.tr', 'Süleymaniye Vakfı');
                $mail->setTo($model->email);
                $mail->setSubject('Kurbanınız Kesilmiştir');
                
                if($url_canli != null)
                    $mail->setAttachment($url_canli);
                
                if ($mail->send()) {
                        $model->kurban_kesim_tarih  = date('Y-m-d H:i:s');
                        $model->kurban_kesim_durum  = 1;
                        if($model->save()){
                            if($smsDurum == 1){
                                 Yii::app()->user->setFlash('contact','Mail ve SMS gönderilmiştir. Durum güncellenmiştir.');
                            } else {
                                 Yii::app()->user->setFlash('contact','Mail gönderilmiştir. Durum güncellenmiştir.');
                            }
                        } else {
                             if($smsDurum == 1){
                                 Yii::app()->user->setFlash('error','Mail ve SMS gönderilmiştir. Fakat durum bilgisi güncellenememiştir.');
                            } else {
                                 Yii::app()->user->setFlash('error','Mail gönderilmiştir. Fakat durum bilgisi güncellenememiştir.');
                            }
                        }
                } else {
                    if($smsDurum == 1){
                        Yii::app()->user->setFlash('error','Mail  gönderiminde hata oluşmuştur Fakat SMS gönderilmiştir. Hata ->'.$mail->getError());
                    } else {
                        Yii::app()->user->setFlash('error','Mail ve SMS gönderiminde hata oluşmuştur. Hata ->'.$mail->getError());
                    }
                }

                $this->render('kesimresult');
                
        }
        
        public function actionIletisimmailnonder($id){
             date_default_timezone_set('Europe/Istanbul');
             $model    = $this->loadContactRecord($id);
             $message  = $_POST['message'];
             
             if($model == null){
                  Yii::app()->user->setFlash('error','Iletişime geçen kişiye ait bilgi bulunamamıştır.Bu bir hata olabilir veya kayıt silinmiş olabilir.');
             } else {
                 
                if( isset($message) == 1 && empty($message) != 1 ){

                     $mail = new YiiMailer();
                     $mail->setData(array('message' => $message, 'name' => $model->ad_soyad,'gelenmesaj'=>$model->mesaj));
                     $mail->setLayout('vakifmail');
                     $mail->setFrom('info@suleymaniyevakfi.com.tr', 'Süleymaniye Vakfı');
                     $mail->setTo($model->mail);
                     $mail->setSubject('Vakfa ilettiğiniz Mesaj');
                     
                     if ($mail->send()) {
                        
                        $model->cevap_durum = 1;
                        $model->cevap_veren_admin_id = Yii::app()->user->id;
                        $model->cevap_mesaj = $message;
                        $model->cevap_tarih = date('Y-m-d H:i:s');
                        $model->save();
                        
                        Yii::app()->user->setFlash('contact','Mail başarıyla gönderilmiştir');
                        
                     } else {
                        Yii::app()->user->setFlash('error','Mail gönderilememiştir. Bir hata oluştu.');
                     }
                     
                } else  {
                   Yii::app()->user->setFlash('error','Mesaj içeriği boş olamaz.');
                }     
             }   
             
            $this->render('kesimresult');
        }

        public function actionSmsgonder($id){
            
              date_default_timezone_set('Europe/Istanbul');
        
              $model    = $this->loadBagisRecord($id);
              $message  = $_POST['message'];
              $telefon  = $model->telefon;
              
              if(isset($message)&&!empty($message)){
                  
                   if (( isset($telefon) == 1) && ( empty($telefon) != 1)) {
                        
                        $smsSend = $this->smsGonder($model->id, $message, $telefon);
                        
                        if( $smsSend->durum == 1  ){
                            
                            // Kurban durumlarını güncelliyoruz, kesildi olarak çıkması için.
                            $model->kurban_kesim_tarih  = date('Y-m-d H:i:s');
                            $model->kurban_kesim_durum  = 1;
                            
                            if($model->save()){
                                Yii::app()->user->setFlash('contact','SMS gönderilmiştir. Durum güncellenmiştir.');
                            } else {
                                Yii::app()->user->setFlash('error','SMS gönderilmiştir. Fakat durum güncellenememiştir');
                            }
                            
                        }  else {
                             $model->kurban_kesim_tarih  = date('Y-m-d H:i:s');
                             $model->kurban_kesim_durum  = 1;
                             Yii::app()->user->setFlash('error','SMS gönderilememiş ve durum bilgisi güncellenememiştir. Lütfen webmaster@suleymaniyevakfi.com.tr adresine bilgilendirme maili atınız.');
                        }
                        
                    } else {
                           Yii::app()->user->setFlash('error','Bağışçı telefon numarası vermemiştir. SMS gönderimi yapılamaz.');
                    }
                  
              } else {
                   Yii::app()->user->setFlash('error','Mesaj içeriği boş olamaz. Lütfen mesajı olduğu gibi bırakınız yada düzelterek gönderiniz.');
              }
              
              $this->render('kesimresult');
               
        }
        
        public function smsGonder($id,$message,$telefon){
            $smsSend = new SMSSend();
            $smsSend->message = $message;
            $smsSend->setMesajBilgileri($telefon);
            $smsSend->sendMessage();
            $smsSend->reponseRead();
            $smsSend->bagis_burs_id = $id;
            $smsSend->numara = $telefon;
            $smsSend->saveToDatabase();
            return $smsSend;
        }
}