<?php
class MLCApiAuthUserSettingBase extends MLCApiClassBase{
	protected $strClassName = 'AuthUserSetting';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objAuthUserSetting = AuthUserSetting::LoadById($strName);
	
      
        if(!is_null($objAuthUserSetting)){
        	return new MLCApiAuthUserSettingObject($objAuthUserSetting);
        }else{
            throw new MLCApiException("No AuthUserSetting found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>