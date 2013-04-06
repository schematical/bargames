<?php
class MLCApiApiDeveloperBase extends MLCApiClassBase{
	protected $strClassName = 'ApiDeveloper';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objApiDeveloper = ApiDeveloper::LoadById($strName);
	
      
        if(!is_null($objApiDeveloper)){
        	return new MLCApiApiDeveloperObject($objApiDeveloper);
        }else{
            throw new MLCApiException("No ApiDeveloper found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>