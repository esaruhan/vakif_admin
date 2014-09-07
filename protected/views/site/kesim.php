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
                array(
                    'label'=>'Mail Gönder',
                    'type'=>'raw',
                    'value'=>'<a href="'.Yii::app()->createUrl('site/kesimyap',array('id'=>$id,'tip'=>'mail')).'">'.'Resimli/Resimsiz Mail Gönder'.'</a>'
                ),
                array(
                    'label'=>'SMS Gönder',
                    'type'=>'raw',
                    'value'=>'<a href="'.Yii::app()->createUrl('site/kesimyap',array('id'=>$id,'tip'=>'sms')).'">'.'SMS Gönder'.'</a>'
                ),
                
                
	),
)); ?>