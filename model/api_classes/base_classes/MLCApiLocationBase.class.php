<?php
class MLCApiLocationBase extends MLCApiClassBase{
	protected $strClassName = 'Location';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objLocation = Location::LoadById($strName);
	
      
        if(!is_null($objLocation)){
        	return new MLCApiLocationObject($objLocation);
        }else{
            throw new MLCApiException("No Location found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>