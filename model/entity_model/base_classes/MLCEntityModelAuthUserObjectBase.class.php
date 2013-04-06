<?php
class MLCEntityModelAuthUserObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'AuthUser';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('AuthAccount'):
				//Load 
				$objAuthAccount = $this->GetEntity()->IdAccount;
				return new MLCEntityModelAuthAccountObject($objIdAccount);
		    break;
		    
			
	     	case('AuthAccounts'):
	       		$arrAuthAccounts = AuthAccount::LoadCollByIdUser($this->GetEntity()->idUser)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrAuthAccounts);
	       		$objResponse->BodyType = 'AuthAccount';
	       		return $objResponse;
	    	break;
			
	     	case('AuthSessions'):
	       		$arrAuthSessions = AuthSession::LoadCollByIdUser($this->GetEntity()->idUser)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrAuthSessions);
	       		$objResponse->BodyType = 'AuthSession';
	       		return $objResponse;
	    	break;
			
	     	case('AuthUserSettings'):
	       		$arrAuthUserSettings = AuthUserSetting::LoadCollByIdUser($this->GetEntity()->idUser)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrAuthUserSettings);
	       		$objResponse->BodyType = 'AuthUserSetting';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}