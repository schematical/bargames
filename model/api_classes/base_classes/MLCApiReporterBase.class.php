<?php
class MLCApiReporterBase extends MLCApiClassBase{
	protected $strClassName = 'Reporter';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objReporter = Reporter::LoadById($strName);
	
      
        if(!is_null($objReporter)){
        	return new MLCApiReporterObject($objReporter);
        }else{
            throw new MLCApiException("No Reporter found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>