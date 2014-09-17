
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BagisRecord
 *
 * @author LifeBook
 */
class BagisRecord extends CActiveRecord {
    
    public $toplamBagis;
    public $aylikBursToplamBagis;

    public $bugunToplamBagis;
    public $bugunAylikBursToplamBagis;
    
    public $smsGonderilecekKisiSayisi;
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName()
    {
        return 'bagis_burs';
    }
    
    
    	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bagis_tip' => 'Bağış Tipi',
			'ad_soyad' => 'Ad Soyad',
			'email' => 'Email',
                        'telefon' => 'Tel:',
                        'bagis_tutar'=>'Bağış Tutar',
                        'durum'=>'Durum',
                        'bagis_zamani'=>'Bağış Zamanı'
		);
	}
    
        public function primaryKey()
        {
            return 'id';
            // For composite primary key, return an array like the following
            // return array('pk1', 'pk2');
        }
        
         public function scopes()
        {
            return array(
                'published'=>array(
                    'condition'=>'durum=1'
                ),
                'recently'=>array(
                    'order'=>'bagis_zamani DESC'
                ),
                'limited'=>array(
                    'limit'=>5
                )
                
            );
        }
    
        
}
