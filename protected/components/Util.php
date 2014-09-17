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
    
    public static function createMailMessage($ad_soyad,$adet,$kurban_tip){
        $messge = 'Vakfımıza bağışlamış olduğunuz '.$adet.' Adet '.$kurban_tip.' kesilmiştir. Vakfımıza göstermiş olduğunuz ilgi için teşekkür ederiz.';
        return $messge;
    }
    public static function createSMSMessage($ad_soyad,$adet,$kurban_tip){
        $messge = 'Sayın '.$ad_soyad.' Vakfımıza bağışlamış olduğunuz '.$adet.' Adet '.$kurban_tip.' kesilmiştir. Vakfımıza göstermiş olduğunuz ilgi için teşekkür ederiz.Süleymaniye Vakfı';
        return $messge;
    }
    
    public static function generateRandomId(){
        $random_id_length = 10; 
        //generate a random id encrypt it and store it in $rnd_id 
        $rnd_id = crypt(uniqid(rand(),1)); 

        //to remove any slashes that might have come 
        $rnd_id = strip_tags(stripslashes($rnd_id)); 

        //Removing any . or / and reversing the string 
        $rnd_id = str_replace(".","",$rnd_id); 
        $rnd_id = strrev(str_replace("/","",$rnd_id)); 

        //finally I take the first 10 characters from the $rnd_id 
        $rnd_id = substr($rnd_id,0,$random_id_length); 
        return $rnd_id;
    }
}
