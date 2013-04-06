<?php
class MLCApiAuthUserObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'AuthUser';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('AuthAccount'):
					//Load 
					$objAuthAccount = $this->GetEntity()->IdAccount;
					return new MLCApiAuthAccountObject($objIdAccount);
			    break;
			    
				
		     	case('authaccounts'):
		       		$arrAuthAccounts = AuthAccount::LoadCollByIdUser($this->GetEntity()->idUser)->GetCollection();
		       		return new MLCApiResponse($arrAuthAccounts);
		    	break;
				
		     	case('authsessions'):
		       		$arrAuthSessions = AuthSession::LoadCollByIdUser($this->GetEntity()->idUser)->GetCollection();
		       		return new MLCApiResponse($arrAuthSessions);
		    	break;
				
		     	case('authusersettings'):
		       		$arrAuthUserSettings = AuthUserSetting::LoadCollByIdUser($this->GetEntity()->idUser)->GetCollection();
		       		return new MLCApiResponse($arrAuthUserSettings);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}