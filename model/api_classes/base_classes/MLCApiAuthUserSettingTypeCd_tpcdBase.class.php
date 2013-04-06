<?php
class MLCApiAuthUserSettingTypeCd_tpcdBase extends MLCApiClassBase{
	protected $strClassName = 'AuthUserSettingTypeCd_tpcd';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objAuthUserSettingTypeCd_tpcd = AuthUserSettingTypeCd_tpcd::LoadById($strName);
	
      
        if(!is_null($objAuthUserSettingTypeCd_tpcd)){
        	return new MLCApiAuthUserSettingTypeCd_tpcdObject($objAuthUserSettingTypeCd_tpcd);
        }else{
            throw new MLCApiException("No AuthUserSettingTypeCd_tpcd found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>