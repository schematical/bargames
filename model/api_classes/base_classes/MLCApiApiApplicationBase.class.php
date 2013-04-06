<?php
class MLCApiApiApplicationBase extends MLCApiClassBase{
	protected $strClassName = 'ApiApplication';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objApiApplication = ApiApplication::LoadById($strName);
	
      
        if(!is_null($objApiApplication)){
        	return new MLCApiApiApplicationObject($objApiApplication);
        }else{
            throw new MLCApiException("No ApiApplication found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>