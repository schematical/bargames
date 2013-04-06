<?php
class MLCApiAlertObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'Alert';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('User'):
					//Load 
					$objUser = $this->GetEntity()->IdUser;
					return new MLCApiUserObject($objIdUser);
			    break;
			    
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}