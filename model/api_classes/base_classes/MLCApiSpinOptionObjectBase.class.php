<?php
class MLCApiSpinOptionObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'SpinOption';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}