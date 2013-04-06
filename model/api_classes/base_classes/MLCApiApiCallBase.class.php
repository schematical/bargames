<?php
class MLCApiApiCallBase extends MLCApiClassBase{
	protected $strClassName = 'ApiCall';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objApiCall = ApiCall::LoadById($strName);
	
      
        if(!is_null($objApiCall)){
        	return new MLCApiApiCallObject($objApiCall);
        }else{
            throw new MLCApiException("No ApiCall found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>