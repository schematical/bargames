<?php
class MLCApiAuthAccountTypeCd_tpcdBase extends MLCApiClassBase{
	protected $strClassName = 'AuthAccountTypeCd_tpcd';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objAuthAccountTypeCd_tpcd = AuthAccountTypeCd_tpcd::LoadById($strName);
	
      
        if(!is_null($objAuthAccountTypeCd_tpcd)){
        	return new MLCApiAuthAccountTypeCd_tpcdObject($objAuthAccountTypeCd_tpcd);
        }else{
            throw new MLCApiException("No AuthAccountTypeCd_tpcd found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>