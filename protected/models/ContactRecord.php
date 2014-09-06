<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactRecord
 *
 * @author ertugrulsaruhan
 */
class ContactRecord  extends CActiveRecord {
    //put your code here
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName()
    {
        return 'vakif_iletisim';
    }
    
            public function attributeLabels()
    {
            return array(
                    'id' => 'ID',
                    'ad_soyad' => 'Ad Soyad',
                    'mail' => 'Email',
                    'tarih'=>'Mesaj Atıldığı Tarih',
                    'konu' => 'Konu',
                    'mesaj' => 'Mesaj',
                    'okundu'=>'Okundu Bilgisi',
                    'telefon'=>'Telefon',
            );
    }
    
            public function primaryKey()
        {
            
            return 'id';
            // For composite primary key, return an array like the following
            // return array('pk1', 'pk2');
        }
    
            public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ad_soyad',$this->ad_soyad,true);
		$criteria->compare('konu',$this->konu,true);
                $criteria->compare('tarih',$this->tarih,true);
                $criteria->compare('okundu',$this->okundu,true);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
