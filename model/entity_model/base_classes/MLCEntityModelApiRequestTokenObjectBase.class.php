<?php
class MLCEntityModelApiRequestTokenObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'ApiRequestToken';
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