<?php
class MLCEntityModelSysConfigEntryObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'SysConfigEntry';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}