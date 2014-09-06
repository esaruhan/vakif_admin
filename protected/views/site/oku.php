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