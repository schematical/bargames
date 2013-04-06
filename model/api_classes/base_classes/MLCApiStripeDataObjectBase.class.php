<?php
class MLCApiStripeDataObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'StripeData';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}