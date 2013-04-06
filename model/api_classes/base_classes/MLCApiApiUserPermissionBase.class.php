<?php
class MLCApiApiUserPermissionBase extends MLCApiClassBase{
	protected $strClassName = 'ApiUserPermission';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objApiUserPermission = ApiUserPermission::LoadById($strName);
	
      
        if(!is_null($objApiUserPermission)){
        	return new MLCApiApiUserPermissionObject($objApiUserPermission);
        }else{
            throw new MLCApiException("No ApiUserPermission found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>