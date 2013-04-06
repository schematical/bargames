<?php
class MLCApiAuthUserTypeCd_tpcdBase extends MLCApiClassBase{
	protected $strClassName = 'AuthUserTypeCd_tpcd';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objAuthUserTypeCd_tpcd = AuthUserTypeCd_tpcd::LoadById($strName);
	
      
        if(!is_null($objAuthUserTypeCd_tpcd)){
        	return new MLCApiAuthUserTypeCd_tpcdObject($objAuthUserTypeCd_tpcd);
        }else{
            throw new MLCApiException("No AuthUserTypeCd_tpcd found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>