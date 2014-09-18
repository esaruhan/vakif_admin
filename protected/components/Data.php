<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Data
 *
 * @author ertugrulsaruhan
 */
class Data {
    //put your code here
    
    
    public  static  function getBursBagisYapanlar(){
        $criteria=new CDbCriteria;
        $criteria->condition='durum=:durum ORDERY BY bagis_zamani DESC';
        $criteria->params=array(':durum'=>1);
        $posts=  BagisRecord::model()->findAll($criteria);
        return $posts;
    }
    
    public static function getBagisYapanlar(){
        $posts=BagisRecord::model()->published()->recently()->findAll();
        return $posts;
    }
    public static function getMesajAtanlar(){
        $criteria=new CDbCriteria;
        $criteria->condition="mesaj IS NOT NULL or mesaj <> '' ORDER BY bagis_zamani DESC";
        $posts=  BagisRecord::model()->findAll($criteria);
        return $posts;
    }  
    public static function getIletisimKuranlar(){
        $criteria=new CDbCriteria;
        $criteria->condition="mesaj IS NOT NULL or mesaj <> '' ORDER BY okundu DESC ";
        $posts=  ContactRecord::model()->findAll($criteria);
        return $posts;
    }  
    
    public static function getKurbanBagisiYapanlar(){
        $criteria=new CDbCriteria;
        $criteria->condition="durum=1 and bagis_tip >= 4 ORDER BY bagis_zamani DESC";
        $posts=  BagisRecord::model()->findAll($criteria);
        return $posts;
    }  
    public static function getKurbanBagisiYapanlarveKesimOlmayanlar(){
        $criteria=new CDbCriteria;
        $criteria->condition="durum=1 and bagis_tip >= 4 and kurban_kesim_durum = 2 ORDER BY bagis_zamani DESC";
        $posts=  BagisRecord::model()->findAll($criteria);
        return $posts;
    }  
    
    public static function getBasarisizBagisYapanlar(){
        $criteria=new CDbCriteria;
        $criteria->condition="durum=2 OR durum = 3 ORDER BY bagis_zamani DESC";
        $posts=  BagisRecord::model()->findAll($criteria);
        return $posts;        
        
    }
    
    public static function getYurtdisiKurbanBagisiYapanlar(){
        $criteria=new CDbCriteria;
        $criteria->condition = "durum=1  ORDER BY bagis_zamani DESC";
        $posts= KurbanRecord::model()->findAll($criteria);
        return $posts;
    }  
    
    public static function getBagisTipi($bagis_tip){
        
         $bagis_tipleri = array('1'=>'Burs','2'=>'Serbest','3'=>'Zekat','4'=>'Kurban','5'=>'Akika Kurbanı','6'=>'Adak Kurbanı','7'=>'Şükür Kurbanı');
    
        if(array_key_exists($bagis_tip, $bagis_tipleri)){
            return $bagis_tipleri[$bagis_tip];
        } else {
            return "BIR HATA VAR";
        }
    }
    
    public static function getLabelData($bagis_tip){
        
        if($bagis_tip == 1){
            return array ("label" => "label-important" , "bagis"=>"Burs");
        } else if($bagis_tip == 2  ){
            return array ("label" => "" , "bagis"=>"Serbest");
        } else if($bagis_tip == 3  ){
            return array ("label" => "label-warning" , "bagis"=>"Zekat");
        } else if($bagis_tip >= 4   ){
             return array ("label" => "label-success" , "bagis"=>"Kurban");
        }
    }
    
    public static function getDurum($durum){
        
        if($durum==1){
            return array ("label" => "label-success" , "durum"=>"BAŞARILI");
        } else if($durum ==2 || $durum ==3){
            return array ("label" => "label-important" , "durum"=>"BAŞARISIZ");
        }
    }
    
    public static function getCevapDurum($durum){
        
        if($durum==1){
            return array ("label" => "label-success" , "durum"=>"CEVAPLANDI");
        } else if($durum ==2 ){
            return array ("label" => "label-important" , "durum"=>"CEVAPLANACAK");
        } else {
            return array ("label" => "label-important" , "durum"=>"CEVAPLANACAK");
     
        }
    }
    
    public static function getMesajDurum($durum){
        
        if($durum==1){
            return array ("label" => "label-success" , "durum"=>"Okundu");
        } else if($durum ==2){
            return array ("label" => "label-important" , "durum"=>"OKU");
        }
    }
    
    /*
     * SMS ile ilgili durumlar buradan..
     */
    public static function getSMSDurum($durum){
        
        if($durum==1){
            return array ("label" => "label-success" , "durum"=>"GÖNDERİLDİ");
        } else if($durum ==2){
            return array ("label" => "label-warning" , "durum"=>"BEKLİYOR");
        } else if($durum == 3){
            return array ("label" => "label-important" , "durum"=>"BAŞARISIZ");
        }
    }
    
    public static function getGonderilenSMSler(){
        $criteria=new CDbCriteria;
        $criteria->condition="durum > 0 ORDER BY msj_saat DESC";
        $posts=  SMSRecord::model()->findAll($criteria);
        return $posts;        
    }
    
     public static function getKurbanDurum($durum){
        
        if($durum==1){
            return array ("label" => "label-success" , "durum"=>"KESİLDİ");
        } else if($durum ==2 ){
            return array ("label" => "label-important" , "durum"=>"KESİLECEK");
        }
        
    }
    
    public static function  getTelefonAramaDurum($telefon){
        if(isset($telefon)&&empty($telefon)!=1){
            return "Ara 0".$telefon;
        } else {
            return "-";
        }
        
    }




    /*
     * SMS ile ilgili durumlar buradan..
     */
}
