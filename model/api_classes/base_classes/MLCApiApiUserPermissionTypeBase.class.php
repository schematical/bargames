<?php
class MLCApiApiUserPermissionTypeBase extends MLCApiClassBase{
	protected $strClassName = 'ApiUserPermissionType';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objApiUserPermissionType = ApiUserPermissionType::LoadById($strName);
	
      
        if(!is_null($objApiUserPermissionType)){
        	return new MLCApiApiUserPermissionTypeObject($objApiUserPermissionType);
        }else{
            throw new MLCApiException("No ApiUserPermissionType found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>