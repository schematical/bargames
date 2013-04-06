<?php
class MLCApiApiCallObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'ApiCall';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('ApiApplication'):
					//Load 
					$objApiApplication = $this->GetEntity()->IdApplication;
					return new MLCApiApiApplicationObject($objIdApplication);
			    break;
			    
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}