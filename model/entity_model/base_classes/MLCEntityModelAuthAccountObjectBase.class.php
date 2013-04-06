<?php
class MLCEntityModelAuthAccountObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'AuthAccount';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('AuthUser'):
				//Load 
				$objAuthUser = $this->GetEntity()->IdUser;
				return new MLCEntityModelAuthUserObject($objIdUser);
		    break;
		    
			
	     	case('AuthUsers'):
	       		$arrAuthUsers = AuthUser::LoadCollByIdAccount($this->GetEntity()->idAccount)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrAuthUsers);
	       		$objResponse->BodyType = 'AuthUser';
	       		return $objResponse;
	    	break;
			
	     	case('Locations'):
	       		$arrLocations = Location::LoadCollByIdAccount($this->GetEntity()->idAccount)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrLocations);
	       		$objResponse->BodyType = 'Location';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}