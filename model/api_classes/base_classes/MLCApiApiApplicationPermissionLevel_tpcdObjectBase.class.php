<?php
class MLCApiApiApplicationPermissionLevel_tpcdObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'ApiApplicationPermissionLevel_tpcd';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
		     	case('apiapplications'):
		       		$arrApiApplications = ApiApplication::LoadCollByIdApplicationPermissionLevel($this->GetEntity()->idApplicationPermissionLevel)->GetCollection();
		       		return new MLCApiResponse($arrApiApplications);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}