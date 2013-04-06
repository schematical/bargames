<?php
class MLCApiApiApplicationStatus_tpcdBase extends MLCApiClassBase{
	protected $strClassName = 'ApiApplicationStatus_tpcd';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objApiApplicationStatus_tpcd = ApiApplicationStatus_tpcd::LoadById($strName);
	
      
        if(!is_null($objApiApplicationStatus_tpcd)){
        	return new MLCApiApiApplicationStatus_tpcdObject($objApiApplicationStatus_tpcd);
        }else{
            throw new MLCApiException("No ApiApplicationStatus_tpcd found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>