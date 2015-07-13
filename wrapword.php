<?php
/**
* Author: Prakash Pulikanti
* Created on: 13th july 2015  
* @parm $string, word split length
* return wrapped string
**/
Class Wrapword
{ 
	protected $str;
	protected $wrapstr = '';
	protected $space = '<br/>';
	protected $char = 'utf8'; 
	protected $splitstr = ' '; 
	protected $length;
	protected $tempArr = array();
	protected $tempStr;
	
	public function setString($string, $charlen = 20)
	{
		$this->str = $string;
		$this->length = $charlen;
	}
	
	public function getWrappedString()
	{
		$this->tempArr = explode($this->splitstr, $this->str);
		
		foreach($this->tempArr as $this->tempStr)
		{ 
			$cnt = mb_strlen($this->tempStr, $this->char);
			if($cnt > $this->length)
			{
				$this->wrapstr .= wordwrap($this->tempStr, $this->length, $this->space, true) . $this->space; 
				
			} else {
				
				$this->wrapstr .= $this->tempStr . $this->space; 
			}
		}
		return $this->wrapstr;
	} 
}
/*
* Usage:
* $this->load->library('wrapword');		
* $this->wrapword->setString($string, 20);		
* echo $this->wrapword->getWrappedString();
*/
