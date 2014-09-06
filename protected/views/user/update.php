<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Kullanıcıları Listele', 'url'=>array('index')),
	array('label'=>'Kullanıcı oluştur', 'url'=>array('create')),
	array('label'=>'Kullanıcıyı Görüntüle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Kullanıcıları Yönet', 'url'=>array('admin')),
);
$this->title = 'Kullanıcıyı Güncelleme'.$model->id;
?>

<!-- <h1>Update User <?php echo $model->id; ?></h1> -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>