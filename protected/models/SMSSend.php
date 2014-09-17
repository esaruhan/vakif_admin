<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SMSSend
 *
 * @author ertugrulsaruhan
 */
class SMSSend  extends CActiveRecord{
    //put your code here
    
    public  $id ;
    public  $kurecell_id;
    public  $service_response;
    public  $baslik             = 'Suleymaniye'; // BAŞLIK BURAYA GELECEK
    public  $durum              = 2;
    public  $bagis_burs_id      ;
    public  $numara             ;
    public  $veriler    = array();
    public  $message ;
    public  $Url    = "http://kurecell.com.tr/kurecellapiV2/api-center/";
      
    public $response_message;
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName()
    {
        return 'giden_mesajlar';
    }
    
    
    public function  sendMessage(){
        
        $ch=curl_init();
        $veri = http_build_query($this->veriler);
        curl_setopt($ch, CURLOPT_URL, $this->Url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS,$veri);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);
        curl_close($ch);
        $this->response_message = $result;
        return $result;
    }
    
    public function  setMesajBilgileri($numara){
        
        $numaralar = array($numara);// İSTEDİĞİNİZ ADET NUMARAYI EKLEYEBİLİRSİNİZ
        
        $this->veriler = array(
                    'apiNo' =>'1',
                    'user' =>'5064896322',
                    'pass' =>'myo_egitim',
                    'mesaj' =>    $this->message,
                    'numaralar' =>$numaralar,
                    'baslik' =>  $this->baslik,
                );
        
    }

        public function primaryKey()
        {
            
            return 'id';
            // For composite primary key, return an array like the following
            // return array('pk1', 'pk2');
        }
        
        public function reponseRead(){
            
           if( substr($this->response_message, 6, 2) === "OK"   ){ 
               $this->kurecell_id = substr($this->response_message,9, 15);
               $this->durum = 1 ;// 2 bekleyen, 3 hatalı, 1 iletildi
               return true;
           } else {
               $this->durum = 3 ;
               return false;
           }
           
        }
        
        public function  saveToDatabase(){
            $record = new SMSRecord();
            $record->message            = $this->message;
            $record->durum              = $this->durum;
            $record->baslik             = $this->baslik;
            $record->bagis_burs_id      = $this->bagis_burs_id;
            $record->kurecell_id        = $this->kurecell_id;
            $record->service_response   = $this->response_message;
            $record->numara             = $this->numara;
            return $record->save();
        }
}
