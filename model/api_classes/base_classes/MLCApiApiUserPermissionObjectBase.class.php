<?php
class MLCApiApiUserPermissionObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'ApiUserPermission';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('ApiUserPermissionType'):
					//Load 
					$objApiUserPermissionType = $this->GetEntity()->IdUserPermissionType;
					return new MLCApiApiUserPermissionTypeObject($objIdUserPermissionType);
			    break;
			    
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}