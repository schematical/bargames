<?php
class MLCApiApiUserPermissionTypeObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'ApiUserPermissionType';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
		     	case('apiuserpermissions'):
		       		$arrApiUserPermissions = ApiUserPermission::LoadCollByIdUserPermissionType($this->GetEntity()->idUserPermissionType)->GetCollection();
		       		return new MLCApiResponse($arrApiUserPermissions);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}