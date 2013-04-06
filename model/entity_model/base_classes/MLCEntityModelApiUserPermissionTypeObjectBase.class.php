<?php
class MLCEntityModelApiUserPermissionTypeObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'ApiUserPermissionType';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('ApiUserPermissions'):
	       		$arrApiUserPermissions = ApiUserPermission::LoadCollByIdUserPermissionType($this->GetEntity()->idUserPermissionType)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrApiUserPermissions);
	       		$objResponse->BodyType = 'ApiUserPermission';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}