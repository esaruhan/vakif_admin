<?php

$this->breadcrumbs=array(
	'Site'=>array('index'),
        'kurbantakip'=>array('kurbantakip'),
	'kesim'=>array('kesim','id'=>$model->id),
        'kesimyap'
);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kesimyap
 *
 * @author ertugrulsaruhan
 */

$telefon = $model->telefon;
$sms_message  = Util::createSMSMessage($model->ad_soyad, $model->kurban_adet, Data::getBagisTipi($model->bagis_tip));
$mail_message = Util::createMailMessage($model->ad_soyad, $model->kurban_adet, Data::getBagisTipi($model->bagis_tip));
?>
 <?php if(Yii::app()->user->hasFlash('error')) { ?>

 <?php } else if(Yii::app()->user->hasFlash('success')) { ?>


 <?php } else  { 
     
 
 if($tip == 'sms') {
 ?>
        <div class="box-content">
    <form class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl('site/smsgonder',array('id'=>$model->id)); ?>">
        <?php 
            $result = json_decode(SMSStatistics::getKalanSMSKontorSayi());

            Yii::app()->user->setFlash('error', '160 karakterden sonra 2 sms olarak ücretlendirilir. ');
            Yii::app()->user->setFlash('info', '307 karakterden sonra 3 sms olarak ücretlendirilir. ');
            echo '<br>';
            Yii::app()->user->setFlash('success', 'Kalan Kontör Sayısı :'.$result->ORJINLI);
        ?>
      <fieldset>
            <legend>SMS ( Mesaj ) Gönderme</legend>
            <div class="control-group">
                 <label class="control-label" for="typeahead">Gönderilecek Mesaj İçeriği : </label>
              <div class="controls">
                  <textarea  name = "message" id="textarea2" rows="6" cols="55" ><?php echo $sms_message; ?></textarea>
              </div>
            </div>
            <div class="form-actions">
              
              <button type="submit" class="btn btn-primary">Gönder</button>
              <button type="reset" class="btn">Temizle</button>
            </div>
     </fieldset>
    </form>   

</div>

<?php
}   else if($tip == 'mail'){
?>

  <div class="box-content">
    <form class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl('site/mailgonder',array('id'=>$model->id)); ?>" enctype="multipart/form-data">
      <fieldset>
            <legend>Mail Gönderme</legend>
            <div class="control-group">
              
                  <textarea  name = "message" id="textarea" rows="6" cols="55" ><?php echo $mail_message; ?></textarea>
              
                 
            </div>
            
            <div style="border: 1px solid ; border-color:#f3f3f3 #bbb #bbb #f3f3f3;  margin: 0pt; padding: 1em; background-color:#eee;">
                <img style="height: 32px; width: 32px; " src="<?php echo Yii::app()->getBaseUrl(true).'/img/take_photo.png'; ?>" /> 
                <input type="file" name="camera_tek"  id="camera_tek" accept="image/*;capture=camera" />
            </div>
                 <br><br>
            <div style="border: 1px solid ; border-color:#f3f3f3 #bbb #bbb #f3f3f3; margin: 0pt; padding: 1em; background-color: #fbef99;">
                <img style="height: 32px; width: 32px; " src="<?php echo Yii::app()->getBaseUrl(true).'/img/galery_photo.png'; ?>" /> 
                <input type="file" name="camera_multiple"  id="camera_multiple" accept="image/*;capture=camera" multiple/>
            </div>
               
              
               
            <div class="form-actions">
              
              <button type="submit" class="btn btn-primary">Gönder</button>
              <button type="reset" class="btn">Temizle</button>
            </div>
     </fieldset>
    </form>   
</div>



 <?php }  }?>
