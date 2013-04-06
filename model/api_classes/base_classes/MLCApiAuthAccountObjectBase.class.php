<?php
class MLCApiAuthAccountObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'AuthAccount';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('AuthUser'):
					//Load 
					$objAuthUser = $this->GetEntity()->IdUser;
					return new MLCApiAuthUserObject($objIdUser);
			    break;
			    
				
		     	case('authusers'):
		       		$arrAuthUsers = AuthUser::LoadCollByIdAccount($this->GetEntity()->idAccount)->GetCollection();
		       		return new MLCApiResponse($arrAuthUsers);
		    	break;
				
		     	case('locations'):
		       		$arrLocations = Location::LoadCollByIdAccount($this->GetEntity()->idAccount)->GetCollection();
		       		return new MLCApiResponse($arrLocations);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}