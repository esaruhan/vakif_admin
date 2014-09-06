<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SMSStatistics
 *
 * @author ertugrulsaruhan
 */
class SMSStatistics {
    //put your code here
    
    
    public static function getBugunGonderilenSMSSayi(){
          $record = new SMSRecord();
          $criteria = new CDbCriteria;
          $criteria->condition    = " DATE(msj_saat) = DATE(NOW()) and durum = 1";
          $user = $record->count($criteria);
          return $user; 
    }
    public static function getGonderilecekMesajSayiKisi(){
        $criteria=new CDbCriteria;
        $criteria->select = "count(DISTINCT(telefon)) as smsGonderilecekKisiSayisi";
        $criteria->condition = "telefon IS NOT NULL AND CHARACTER_LENGTH(telefon) >= 10";
        $posts= BagisRecord::model()->find($criteria);
        return $posts->smsGonderilecekKisiSayisi;  
    }
    
    public static function getKalanSMSKontorSayi(){
            $veriler = array(
                'apiNo' =>'2',
                'user' =>'5064896322',
                'pass' =>'myo_egitim'
            );
            
            $ch=curl_init();
            $veri = http_build_query($veriler);
            curl_setopt($ch, CURLOPT_URL, "http://kurecell.com.tr/kurecellapiV2/api-center/");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1) ;
            curl_setopt($ch, CURLOPT_POSTFIELDS,$veri);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
    }
    
    
    
    
        
}
