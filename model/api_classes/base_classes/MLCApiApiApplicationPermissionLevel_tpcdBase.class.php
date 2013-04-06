<?php
class MLCApiApiApplicationPermissionLevel_tpcdBase extends MLCApiClassBase{
	protected $strClassName = 'ApiApplicationPermissionLevel_tpcd';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objApiApplicationPermissionLevel_tpcd = ApiApplicationPermissionLevel_tpcd::LoadById($strName);
	
      
        if(!is_null($objApiApplicationPermissionLevel_tpcd)){
        	return new MLCApiApiApplicationPermissionLevel_tpcdObject($objApiApplicationPermissionLevel_tpcd);
        }else{
            throw new MLCApiException("No ApiApplicationPermissionLevel_tpcd found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>