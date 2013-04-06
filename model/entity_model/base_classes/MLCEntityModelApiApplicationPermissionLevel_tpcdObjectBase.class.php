<?php
class MLCEntityModelApiApplicationPermissionLevel_tpcdObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'ApiApplicationPermissionLevel_tpcd';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('ApiApplications'):
	       		$arrApiApplications = ApiApplication::LoadCollByIdApplicationPermissionLevel($this->GetEntity()->idApplicationPermissionLevel)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrApiApplications);
	       		$objResponse->BodyType = 'ApiApplication';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}