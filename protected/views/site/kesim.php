<?php
/* @var $this UserController */
/* @var $data User */
$this->title = 'Görüntülenen Kurban ID : #.'.$model->id;
$this->breadcrumbs=array(
	'Site'=>array('index'),
        'kurbantakip'=>array('kurbantakip'),
	'kesim',
);

    $id                       = $model->id;
    $ad_soyad                 = $model->ad_soyad;
    $bagis_tip                = $model->bagis_tip;
    $email                    = $model->email;
    $telefon                  = $model->telefon;
    $mesaj                    = $model->mesaj;
    $kurban_odeme_sekli       = $model->kurban_odeme_sekli;
    $kurban_taksi             = $model->kurban_taksit;
    $bagis_zamani             = $model->bagis_zamani;
    $kurban_adet              = $model->kurban_adet;
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ad_soyad',
		'email',
                'telefon',
                'mesaj',
                 array(
                    'label'=>'Kurban Adet',
                    'type'=>'raw',
                    'value'=>$model->kurban_adet.' Adet'
                ),
                 array(
                    'label'=>'Kurban Tip',
                    'type'=>'raw',
                    'value'=>Data::getBagisTipi($model->bagis_tip)
                ),
                'bagis_zamani',
                'kurban_kesim_durum',
                
                
	),
)); ?>

<div class="login-callout">
    <div class="login-callout-btns">
        <?php if(( isset($email) == 1) && ( empty($email) != 1)) { ?>
        <a class="big-button-blue" href="<?php  echo Yii::app()->createUrl('site/kesimyap',array('id'=>$id,'tip'=>'mail')) ?>">
                    <img class="sms_mail" src="<?php echo Yii::app()->getBaseUrl(true)."/img/email-sms.png"?>" /> <br>
            <span class="button-subtitle">  Mail ve SMS Gönder »  </span>
        </a>
        <?php } ?>
        &nbsp; &nbsp;
        <?php if(( isset($telefon) == 1) && ( empty($telefon) != 1)) { ?>
         <a class="big-button-green" href="<?php echo Yii::app()->createUrl('site/kesimyap',array('id'=>$id,'tip'=>'sms')); ?>">
                    <img class="sms_mail" src="<?php echo Yii::app()->getBaseUrl(true)."/img/sms.gif"?>" /> <br>
            <span class="button-subtitle"> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;SMS Gönder » &nbsp; &nbsp; &nbsp;&nbsp;</span>
        </a>
        <?php } ?>
    </div>
</div>