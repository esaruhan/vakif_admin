<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SMSRecord
 *
 * @author ertugrulsaruhan
 */
class SMSRecord extends CActiveRecord{
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName()
    {
        return 'giden_mesajlar';
    }
    
    public function primaryKey()
   {

       return 'id';
       // For composite primary key, return an array like the following
       // return array('pk1', 'pk2');
   }
    
    //put your code here
}
