<?php
class MLCEntityModelApiApplicationObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'ApiApplication';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('ApiDeveloper'):
				//Load 
				$objApiDeveloper = $this->GetEntity()->IdDeveloper;
				return new MLCEntityModelApiDeveloperObject($objIdDeveloper);
		    break;
		    
	       	case('ApiApplicationStatus_tpcd'):
				//Load 
				$objApiApplicationStatus_tpcd = $this->GetEntity()->IdApplicationStatusTypeCd;
				return new MLCEntityModelApiApplicationStatus_tpcdObject($objIdApplicationStatusTypeCd);
		    break;
		    
	       	case('ApiApplicationPermissionLevel_tpcd'):
				//Load 
				$objApiApplicationPermissionLevel_tpcd = $this->GetEntity()->IdApplicationPermissionLevel;
				return new MLCEntityModelApiApplicationPermissionLevel_tpcdObject($objIdApplicationPermissionLevel);
		    break;
		    
			
	     	case('ApiCalls'):
	       		$arrApiCalls = ApiCall::LoadCollByIdApplication($this->GetEntity()->idApplication)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrApiCalls);
	       		$objResponse->BodyType = 'ApiCall';
	       		return $objResponse;
	    	break;
			
	     	case('ApiRequestTokens'):
	       		$arrApiRequestTokens = ApiRequestToken::LoadCollByIdApplication($this->GetEntity()->idApplication)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrApiRequestTokens);
	       		$objResponse->BodyType = 'ApiRequestToken';
	       		return $objResponse;
	    	break;
			
	     	case('PlayerApps'):
	       		$arrPlayerApps = PlayerApp::LoadCollByIdApp($this->GetEntity()->idApp)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrPlayerApps);
	       		$objResponse->BodyType = 'PlayerApp';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}