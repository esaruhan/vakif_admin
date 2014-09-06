<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Kullanıcıları Listele', 'url'=>array('index')),
	array('label'=>'Kullanıcı Oluştur', 'url'=>array('create')),
	array('label'=>'Kullanıcıyı Güncelle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Kullanıcıyı Sil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kullanıcıları Yönet', 'url'=>array('admin')),
);
$this->title = 'Görüntülenen Kullanıcı : #.'.$model->id;
?>

<?php /*<h1>View User #<?php echo $model->id; ?></h1>  */?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
                'name',
                'surname',
                'role',
	),
)); ?>
