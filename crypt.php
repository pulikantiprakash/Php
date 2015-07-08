<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
* Two way encryption for any seceret data with secret key
* Author: Prakash Reddy Pulikanti
* Created On: 7th May 2015
*/
class Crypt
{
    private $secretkey = '';
	 
	
    public function encrypt($text, $key)
	{
		$this->secretkey = $key;
        $data = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->secretkey, $text, MCRYPT_MODE_ECB, 'key');
        $en_string =  base64_encode($data);
		$url_safe_base64 = strtr( $en_string, "+/", "-_" );
		return $url_safe_base64;
    }
 
    public function decrypt($text, $key) 
	{
		$this->secretkey = $key;
		$de_string = strtr( $text, "-_", "+/" );
        $text1 = base64_decode($de_string);		
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->secretkey, $text1, MCRYPT_MODE_ECB, 'key');
    }
} 
?>
