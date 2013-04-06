<?php
class MLCEntityModelMLCBatchObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'MLCBatch';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}