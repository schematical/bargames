<?php
class MLCEntityModelApiCallObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'ApiCall';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('ApiApplication'):
				//Load 
				$objApiApplication = $this->GetEntity()->IdApplication;
				return new MLCEntityModelApiApplicationObject($objIdApplication);
		    break;
		    
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}