<?php
class MLCApiLocationObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'Location';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('AuthAccount'):
					//Load 
					$objAuthAccount = $this->GetEntity()->IdAccount;
					return new MLCApiAuthAccountObject($objIdAccount);
			    break;
			    
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}