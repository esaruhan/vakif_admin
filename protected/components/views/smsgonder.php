<div class="box-content">
    <form class="form-horizontal" method="post" action="">
        <?php 
                $result = json_decode(SMSStatistics::getKalanSMSKontorSayi());

            Yii::app()->user->setFlash('error', '160 karakterden sonra 2 sms olarak ücretlendirilir. ');
            Yii::app()->user->setFlash('info', '307 karakterden sonra 3 sms olarak ücretlendirilir. ');
            Yii::app()->user->setFlash('block', 'Gönderilecek Kişi Sayısı :'.SMSStatistics::getGonderilecekMesajSayiKisi());
            Yii::app()->user->setFlash('success', 'Kalan Kontör Sayısı :'.$result->ORJINLI);
        ?>
      <fieldset>
            <legend>SMS ( Mesaj ) Gönderme</legend>
            <div class="control-group">
                 <label class="control-label" for="typeahead">Gönderilecek Mesaj İçeriği : </label>
              <div class="controls">
                  <textarea  name = "message" id="textarea2" rows="6" cols="55"></textarea>
              </div>
            </div>
<!--            <div style="margin-left: 157px;">
                  <b>
                    <button class="btn btn-mini btn-warning" type="button">160 karakterden sonra 2 sms olarak ücretlendirilir.</button> 
                    <br> <button class="btn btn-mini btn-warning" type="button">307 karakterden sonra 3 sms olarak ücretlendirilir.</button>
                  </b>
            </div>-->
            
            <div class="form-actions">
              
              <button type="submit" class="btn btn-primary">Gönder</button>
              <button type="reset" class="btn">Temizle</button>
            </div>
     </fieldset>
    </form>   

</div>