<?php
class MLCEntityModelApiUserPermissionObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'ApiUserPermission';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('ApiUserPermissionType'):
				//Load 
				$objApiUserPermissionType = $this->GetEntity()->IdUserPermissionType;
				return new MLCEntityModelApiUserPermissionTypeObject($objIdUserPermissionType);
		    break;
		    
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}