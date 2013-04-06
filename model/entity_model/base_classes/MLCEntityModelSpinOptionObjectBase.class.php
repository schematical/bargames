<?php
class MLCEntityModelSpinOptionObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'SpinOption';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}