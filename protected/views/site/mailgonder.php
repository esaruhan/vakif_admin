<?php
/* @var $this UserController */
/* @var $data User */
$this->title = 'Mail Gönderilecek ID : #.'.$model->id;
$this->breadcrumbs=array(
	'Site'=>array('index'),
        'iletisimliste'=>array('iletisimliste'),
	'oku'=>array('oku','id'=>$model->id),
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

<div class="box-content">
    <form class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl('site/iletisimmailnonder',array('id'=>$model->id)); ?>" enctype="multipart/form-data">
      <fieldset>
            <legend>Mail Gönderme</legend>
            <p> <b>Not :</b> Lütfen mesaj içeriğine kişinin ismini <b><u>yazmayın.</u></b>. Otomatik olarak eklenecektir.</p>
            <br><br>
            <div class="control-group">
              
                  <textarea  name = "message" id="textarea" rows="6" cols="55" ></textarea>
            </div>
            
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Gönder</button>
              <button type="reset" class="btn">Temizle</button>
            </div>
     </fieldset>
    </form>   
</div>