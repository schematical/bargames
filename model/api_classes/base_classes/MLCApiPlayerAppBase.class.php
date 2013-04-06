<?php
class MLCApiPlayerAppBase extends MLCApiClassBase{
	protected $strClassName = 'PlayerApp';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objPlayerApp = PlayerApp::LoadById($strName);
	
      
        if(!is_null($objPlayerApp)){
        	return new MLCApiPlayerAppObject($objPlayerApp);
        }else{
            throw new MLCApiException("No PlayerApp found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>