<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Kullanıcı oluştur', 'url'=>array('create')),
	array('label'=>'Kullanıcıları Yönet', 'url'=>array('admin')),
);
$this->title = 'Kullanıcılar Listesi';
?>

<!-- <h1>Users</h1> -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
