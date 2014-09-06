<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Kullanıcıları Listele', 'url'=>array('index')),
	array('label'=>'Kullanıcıları Yönet', 'url'=>array('admin')),
);
$this->title = 'Kullanıcı Oluştur';
?>

<!-- <h1>Create User</h1> -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>