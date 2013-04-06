<?php
class MLCApiApiRequestTokenBase extends MLCApiClassBase{
	protected $strClassName = 'ApiRequestToken';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objApiRequestToken = ApiRequestToken::LoadById($strName);
	
      
        if(!is_null($objApiRequestToken)){
        	return new MLCApiApiRequestTokenObject($objApiRequestToken);
        }else{
            throw new MLCApiException("No ApiRequestToken found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>