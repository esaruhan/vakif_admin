<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class StasticCounts {
    
            
        public static function getToplamBagisYapanlarSayi(){
            $record = new BagisRecord();
            $criteria=new CDbCriteria;
            $criteria->condition='durum=:durum';
            $criteria->params=array(':durum'=>1);
            $n    = $record->count($criteria); 
            return $n;
        }
    
        public static function getToplamBursBagisYapanlar(){
            $record = new BagisRecord();
            $criteria=new CDbCriteria;
            $criteria->condition='durum=:durum AND bagis_tip=:bagis_tip AND bagis_odeme_sekli=:bagis_odeme_sekli';
            $criteria->params=array(':durum'=>1,':bagis_tip'=>1,':bagis_odeme_sekli'=>1);
            $n    = $record->count($criteria ); 
            return $n; 
        }
        
        public static function getToplamTekSeferBursBagisYapanlar(){
            $record = new BagisRecord();
            $criteria=new CDbCriteria;
            $criteria->condition='durum=:durum AND bagis_tip=:bagis_tip AND bagis_odeme_sekli=:bagis_odeme_sekli';
            $criteria->params=array(':durum'=>1,':bagis_tip'=>1,':bagis_odeme_sekli'=>0);
            $n    = $record->count($criteria ); 
            return $n; 
        }
    
        public static function getToplamKurbanBagisYapanlar(){
            $record = new BagisRecord();
            $criteria=new CDbCriteria;
            $criteria->condition='durum=:durum AND bagis_tip >= :bagis_tip';
            $criteria->params=array(':durum'=>1,':bagis_tip'=>4);
            $n    = $record->count($criteria ); 
            return $n; 
        }
    
        public static function getToplamZekatBagisYapanlar(){
            $record = new BagisRecord();
            $criteria=new CDbCriteria;
            $criteria->condition='durum=:durum AND bagis_tip = :bagis_tip';
            $criteria->params=array(':durum'=>1,':bagis_tip'=>3);
            $n    = $record->count($criteria ); 
            return $n; 
        }
        
        public static function getToplamSerbestBagisYapanlar(){
            $record = new BagisRecord();
            $criteria=new CDbCriteria;
            $criteria->condition='durum=:durum AND bagis_tip = :bagis_tip';
            $criteria->params=array(':durum'=>1,':bagis_tip'=>2);
            $n    = $record->count($criteria ); 
            return $n; 
        }
        public static function getToplamBagisMiktari(){
            $record = new BagisRecord();
            
            $criteria = new CDbCriteria;
            $criteria->select='SUM(bagis_tutar) as toplamBagis';
            $criteria->condition='durum = 1';
            $user = $record->find($criteria);
            return $user->toplamBagis; 
        }
        
        public static function getAylikToplamBursBagisMiktari(){
            $record = new BagisRecord();
            // SQL = select id, bagis_zamani, bagis_tekrar, period_diff(date_format(now(), '%Y%m'), date_format(bagis_zamani, '%Y%m')) as months from bagis_burs where durum = 1 AND  bagis_tip = 1 AND bagis_odeme_sekli = 1 AND ( period_diff(date_format(now(), '%Y%m'), date_format(bagis_zamani, '%Y%m')) + 1 ) <= bagis_tekrar and durum = 1
            $criteria = new CDbCriteria;
            $criteria->select='SUM(bagis_tutar) as aylikBursToplamBagis';
            $criteria->condition=" durum = 1 AND  bagis_tip = 1 AND bagis_odeme_sekli = 1 AND ".
                                 " ( period_diff(date_format(now(), '%Y%m'), date_format(bagis_zamani, '%Y%m')) + 1 ) <= bagis_tekrar";
            
            $user = $record->find($criteria);
            
            return $user->aylikBursToplamBagis; 
        }
        
        public static function getBugunBagisSayi(){
//             SQL  = DATE(bagis_zamani) = DATE(NOW());
//            $SQL = 'SELECT count(*) as bugunBagisSayi FROM bagis_burs WHERE DATE(bagis_zamani) = DATE(NOW()) and durum = 1';
            $record = new BagisRecord();
            $criteria = new CDbCriteria;
            $criteria->condition    = " DATE(bagis_zamani) = DATE(NOW()) AND durum = 1";
            $user = $record->count($criteria);
            return $user; 
        }
        
        public static function getBugunBursBagisSayi(){
//             SQL  = DATE(bagis_zamani) = DATE(NOW());
//            $SQL = 'SELECT count(*) as bugunBagisSayi FROM bagis_burs WHERE DATE(bagis_zamani) = DATE(NOW()) and durum = 1';
            $record = new BagisRecord();
            $criteria = new CDbCriteria;
            $criteria->condition    = " DATE(bagis_zamani) = DATE(NOW()) AND durum = 1 AND bagis_tip = 1 AND bagis_odeme_sekli = 1";
            $user = $record->count($criteria);
            return $user; 
        }
        
        public static function getBugunKurbanBagisSayi(){
//             SQL  = DATE(bagis_zamani) = DATE(NOW());
//            $SQL = 'SELECT count(*) as bugunBagisSayi FROM bagis_burs WHERE DATE(bagis_zamani) = DATE(NOW()) and durum = 1';
            $record = new BagisRecord();
            $criteria = new CDbCriteria;
            $criteria->condition    = " DATE(bagis_zamani) = DATE(NOW()) AND durum = 1 AND bagis_tip >= 4 ";
            $user = $record->count($criteria);
            return $user; 
        }
        
        public static function getBugunSerbestBagisSayi(){
//             SQL  = DATE(bagis_zamani) = DATE(NOW());
//            $SQL = 'SELECT count(*) as bugunBagisSayi FROM bagis_burs WHERE DATE(bagis_zamani) = DATE(NOW()) and durum = 1';
            $record = new BagisRecord();
            $criteria = new CDbCriteria;
            $criteria->condition    = " DATE(bagis_zamani) = DATE(NOW()) AND durum = 1 AND bagis_tip = 2 ";
            $user = $record->count($criteria);
            return $user; 
        }
        public static function getBugunZekatBagisSayi(){
//             SQL  = DATE(bagis_zamani) = DATE(NOW());
//            $SQL = 'SELECT count(*) as bugunBagisSayi FROM bagis_burs WHERE DATE(bagis_zamani) = DATE(NOW()) and durum = 1';
            $record = new BagisRecord();
            $criteria = new CDbCriteria;
            $criteria->condition    = " DATE(bagis_zamani) = DATE(NOW()) AND durum = 1 AND bagis_tip = 3 ";
            $user = $record->count($criteria);
            return $user; 
        }
        
        public static function getBugunTekSeferBursBagis(){
            $record = new BagisRecord();
            $criteria = new CDbCriteria;     
            $criteria->condition    = " DATE(bagis_zamani) = DATE(NOW()) AND durum = 1 AND bagis_tip = 1 AND bagis_odeme_sekli = 0";
            $user = $record->count($criteria);
            return $user;        
            
        }
        
        public static function getBugunToplamBagisMiktar(){
//             SQL  = DATE(bagis_zamani) = DATE(NOW());
//            $SQL = 'SELECT count(*) as bugunBagisSayi FROM bagis_burs WHERE DATE(bagis_zamani) = DATE(NOW()) and durum = 1';
            $record = new BagisRecord();
            $criteria = new CDbCriteria;
            $criteria->select='SUM(bagis_tutar) as bugunToplamBagis';
            $criteria->condition    = " DATE(bagis_zamani) = DATE(NOW()) AND durum = 1 ";
            $user = $record->find($criteria);
            return $user->bugunToplamBagis; 
        }
        
        public static function getBugunToplamAylikBagisMiktar(){
//             SQL  = DATE(bagis_zamani) = DATE(NOW());
//            $SQL = 'SELECT count(*) as bugunBagisSayi FROM bagis_burs WHERE DATE(bagis_zamani) = DATE(NOW()) and durum = 1';
            $record = new BagisRecord();
            $criteria = new CDbCriteria;
            $criteria->select='SUM(bagis_tutar) as bugunAylikBursToplamBagis';
            $criteria->condition    = " DATE(bagis_zamani) = DATE(NOW()) AND durum = 1 AND bagis_tip = 1 AND bagis_odeme_sekli = 1";
            $user = $record->find($criteria);
            return $user->bugunAylikBursToplamBagis; 
        }
        
        /*
          * Okunmamışların sayısını alıyoruz
          */
        public static function getBugunVakifIletisimGecenler(){
            $record = new ContactRecord();
            $criteria = new CDbCriteria;     
            $criteria->condition    = " DATE(tarih) = DATE(NOW()) AND okundu = 2";
            $user = $record->count($criteria);
            return $user;        
        }
        
         /*
          * Okunmamışların sayısını alıyoruz
          */
         public static function getToplamVakifIletisimGecenler(){
            $record = new ContactRecord();
            $criteria = new CDbCriteria;     
            $criteria->condition    = " okundu = 2";
            $user = $record->count($criteria);
            return $user;        
        }

}