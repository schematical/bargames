<?php
class MLCApiAlertBase extends MLCApiClassBase{
	protected $strClassName = 'Alert';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objAlert = Alert::LoadById($strName);
	
      
        if(!is_null($objAlert)){
        	return new MLCApiAlertObject($objAlert);
        }else{
            throw new MLCApiException("No Alert found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>