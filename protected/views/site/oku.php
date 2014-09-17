<?php
/* @var $this UserController */
/* @var $data User */
$this->title = 'Görüntülenen Mesaj : #.'.$model->id;
$this->breadcrumbs=array(
	'Site'=>array('index'),
        'iletisimliste'=>array('iletisimliste'),
	'oku',
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ad_soyad',
		'konu',
		'mesaj',
                'telefon',
                'mail',
                'tarih',
                
	),
)); ?>


<div class="login-callout">
    <div class="login-callout-btns">
        <a class="big-button-blue" href="<?php  echo Yii::app()->createUrl('site/mailgonderme',array('id'=>$model->id,'tip'=>'mail')) ?>">
                    <img class="sms_mail" src="<?php echo Yii::app()->getBaseUrl(true)."/img/email-sms.png"?>" /> <br>
            <span class="button-subtitle">  Mail ile Geri Dön »  </span>
        </a>
        &nbsp; &nbsp;
    </div>
</div>