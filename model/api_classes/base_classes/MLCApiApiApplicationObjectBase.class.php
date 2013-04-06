<?php
class MLCApiApiApplicationObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'ApiApplication';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('ApiDeveloper'):
					//Load 
					$objApiDeveloper = $this->GetEntity()->IdDeveloper;
					return new MLCApiApiDeveloperObject($objIdDeveloper);
			    break;
			    
		       	case('ApiApplicationStatus_tpcd'):
					//Load 
					$objApiApplicationStatus_tpcd = $this->GetEntity()->IdApplicationStatusTypeCd;
					return new MLCApiApiApplicationStatus_tpcdObject($objIdApplicationStatusTypeCd);
			    break;
			    
		       	case('ApiApplicationPermissionLevel_tpcd'):
					//Load 
					$objApiApplicationPermissionLevel_tpcd = $this->GetEntity()->IdApplicationPermissionLevel;
					return new MLCApiApiApplicationPermissionLevel_tpcdObject($objIdApplicationPermissionLevel);
			    break;
			    
				
		     	case('apicalls'):
		       		$arrApiCalls = ApiCall::LoadCollByIdApplication($this->GetEntity()->idApplication)->GetCollection();
		       		return new MLCApiResponse($arrApiCalls);
		    	break;
				
		     	case('apirequesttokens'):
		       		$arrApiRequestTokens = ApiRequestToken::LoadCollByIdApplication($this->GetEntity()->idApplication)->GetCollection();
		       		return new MLCApiResponse($arrApiRequestTokens);
		    	break;
				
		     	case('playerapps'):
		       		$arrPlayerApps = PlayerApp::LoadCollByIdApp($this->GetEntity()->idApp)->GetCollection();
		       		return new MLCApiResponse($arrPlayerApps);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}