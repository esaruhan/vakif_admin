<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
$this->title = 'Dashboard';
?>
<?php if (isset($_GET['view'])):
$this->widget('Wmain',array('view'=>$_GET['view']));	
else:

    ?>

<div class="sortable row-fluid">
    
    <a data-rel="tooltip" title="<?php echo StasticCounts::getBugunBagisSayi() ?> Yeni Bugün Bağış."
            class="well span3 top-block" href="#"> <span
            class="icon32 icon-red icon-user"></span>
            <div>Toplam Bağış Yapanlar</div>
            <div><?php echo  StasticCounts::getToplamBagisYapanlarSayi() ; ?></div> 
            <span class="notification"><?php echo StasticCounts::getBugunBagisSayi() ?></span>
    </a> 
    
    <a data-rel="tooltip" title="<?php echo StasticCounts::getBugunBursBagisSayi() ?> Yeni Bugün Burs Bağış."
            class="well span3 top-block" href="#"> <span
            class="icon32 icon-color icon-star-on"></span>
            <div>Burs Bağışı Yapanlar</div>
            <div><?php echo  StasticCounts::getToplamBursBagisYapanlar() ; ?></div> 
            <span class="notification green"><?php echo StasticCounts::getBugunBursBagisSayi() ?></span>
    </a>
    <a data-rel="tooltip" title="<?php echo StasticCounts::getBugunTekSeferBursBagis(); ?> Yeni Bugün  Tek Seferlik Burs Bağış ."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-star-on"></span>
		<div>Tek Seferlik Burs Bağış</div>
                <div><?php echo StasticCounts::getToplamTekSeferBursBagisYapanlar(); ?> </div> 
                <span class="notification yellow"><?php echo StasticCounts::getBugunTekSeferBursBagis();?> </span>
    </a> 
    
    <a data-rel="tooltip" title="<?php  echo StasticCounts::getBugunKurbanBagisSayi(); ?> Yeni Bugün Kurban Bağış."
            class="well span3 top-block" href="#"> <span
            class="icon32 icon-color icon-star-on"></span>
            <div>Kurban Bağışı Yapanlar</div>
            <div><?php echo  StasticCounts::getToplamKurbanBagisYapanlar() ; ?></div> 
            <span class="notification red"><?php  echo StasticCounts::getBugunKurbanBagisSayi(); ?></span>
    </a>
         

    </div>
    <div class="sortable row-fluid">
    <a data-rel="tooltip" title="<?php echo  StasticCounts::getBugunSerbestBagisSayi(); ?> Yeni Bugün Serbest Bağış."
            class="well span3 top-block" href="#"> <span
            class="icon32 icon-color icon-star-on"></span>
            <div>Serbest Bağış Yapanlar</div>
            <div><?php echo  StasticCounts::getToplamSerbestBagisYapanlar() ; ?></div> 
            <span class="notification green"><?php echo  StasticCounts::getBugunSerbestBagisSayi();?></span>
    </a>
    <a data-rel="tooltip" title="<?php echo StasticCounts::getBugunZekatBagisSayi(); ?> Yeni Bugün Zekat Bağış."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-star-on"></span>
		<div>Zekat Bağışı Yapanlar</div>
                <div><?php echo  StasticCounts::getToplamZekatBagisYapanlar() ; ?></div> 
                <span class="notification darkblue"><?php echo StasticCounts::getBugunZekatBagisSayi(); ?></span>
    </a>
    
    <a data-rel="tooltip" title="<?php echo StasticCounts::getBugunToplamBagisMiktar(); ?> TL Bugün Yapılan Bağış ."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-cart"></span>
		<div>Toplam Bağış Yapılan Miktar</div>
		<div><?php echo StasticCounts::getToplamBagisMiktari(); ?> TL</div> 
                <span class="notification yellow"><?php echo StasticCounts::getBugunToplamBagisMiktar();?> TL</span>
    </a> 
    
    <a data-rel="tooltip" title=" <?php  echo StasticCounts::getBugunToplamAylikBagisMiktar();?> TL Yeni Bugün Burs Bağış Miktarı ."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-calendar"></span>
		<div>Aylık Burş Bağış Miktar</div>
		<div><?php echo StasticCounts::getAylikToplamBursBagisMiktari();?> TL</div> 
                <span class="notification"><?php  echo StasticCounts::getBugunToplamAylikBagisMiktar();?> TL</span>
    </a>
    
</div>
<div class="sortable row-fluid">
    
    <a data-rel="tooltip" title=" <?php  echo SMSStatistics::getBugunGonderilenSMSSayi();?> Adet Bugün Gönderilen SMS ."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-mail-closed"></span>
		<div>Kalan SMS Kontör Miktarı</div>
		<div>
                    <?php 
                           $result = json_decode(SMSStatistics::getKalanSMSKontorSayi());
                           echo $result->ORJINLI;
                    ?> Adet</div> 
                <span class="notification"><?php  echo SMSStatistics::getBugunGonderilenSMSSayi();?> Adet</span>
    </a>
        <a data-rel="tooltip" title=" <?php  echo StasticCounts::getBugunVakifIletisimGecenler();?> Bugün Vakfa Gönderilen Mesaj."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-messages"></span>
		<div>Okunmamış Mesaj Sayısı</div>
                <div><?php echo StasticCounts::getToplamVakifIletisimGecenler();?> Adet</div> 
                <span class="notification red"><?php  echo StasticCounts::getBugunVakifIletisimGecenler();?> Adet</span>
    </a>
    <a data-rel="tooltip" title="<?php  echo StasticCounts::getBugunVakifIletisimGecenlerCevaplanmayanlar();?> Bugün Gelmiş Fakat Cevaplanmayan Mesajlar"
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-envelope-open"></span>
		<div>Cevaplanmamış Mesaj Sayısı</div>
                <div><?php echo StasticCounts::getToplamVakifIletisimGecenlerCevaplanmayanlar();?> Adet</div> 
                <span class="notification red"><?php  echo StasticCounts::getBugunVakifIletisimGecenlerCevaplanmayanlar();?> Adet</span>
    </a>
      <a data-rel="tooltip" title=" <?php  echo StasticCounts::getBugunYurtdisiKurbanBagisiYapanlar();?> Bugün Yapılan Yurtdışı Kurban."
		class="well span3 top-block" href="#"> <span
		class="icon32 icon-color icon-globe"></span>
		<div>Yurtdışı Kurban Bağışı</div>
                <div><?php echo StasticCounts::getToplamYurtdisiKurbanBagisiYapanlar();?> Adet</div> 
                <span class="notification red"><?php  echo StasticCounts::getBugunYurtdisiKurbanBagisiYapanlar();?> Adet</span>
    </a>
    
</div>
<div class="sortable row-fluid">
   
</div>

<?php endif;?>
