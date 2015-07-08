<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class price
{
	protected $returnprice = 0;
	protected $pricestring;
	 
	public function pricematch($string)
	{
		$this->pricestring =  preg_replace('/\s+/', '', $string);
		if (strpos($this->pricestring,'万元') != false) 
		{
			$price = explode("万元", $this->pricestring);
			
			for($i=0;$i<sizeof($price);$i++)
			{
				if(is_numeric($price[$i]))
				{
					$this->returnprice = $price[$i] * 10000;
				} 
			} 	
		} elseif (strpos($this->pricestring,'元') != false) 
		{
			$price = explode("元", $this->pricestring);
			
			for($i=0;$i<sizeof($price);$i++)
			{
				if(is_numeric($price[$i]))
				{
					$this->returnprice = $price[$i] * 1000;
				} 
			} 	
		} else {
			$this->returnprice = $this->pricestring;
		}	
		return $this->returnprice;
	}
}
/*
* Parameters: 万元20
*
* Usage: 
*		$this->load->library('price');
* 		$result = $this->price->pricematch('万元20'); 
*		$test = '<html><head><meta charset="utf-8"></head><body>';
*		$test .= $result. '</body></html>';
*		echo $test; 
*
* Result: 20000
*/
