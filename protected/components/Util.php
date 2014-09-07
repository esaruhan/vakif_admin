<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author ertugrulsaruhan
 */
class Util {
    //put your code here
    
    
    public static function checkVariableValidity($var){
       if( $var != null && (isset($var) == 1) && ( empty($var) != 1)  ){
           return true;
       } 
       return false;
    }
    
    public static function createSMSMessage($ad_soyad,$adet,$kurban_tip){
        $messge = 'Sayın '.$ad_soyad .' vakfımıza bağışlamış olduğunuz '.$adet.' Adet '.$kurban_tip.' kesilmiştir. Süleymaniye Kültür Sanat Eğitim ve Sağlık Vakfı';
        return $messge;
    }
}
