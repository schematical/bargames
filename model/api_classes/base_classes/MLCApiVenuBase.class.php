<?php
class MLCApiVenuBase extends MLCApiClassBase{
	protected $strClassName = 'Venu';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objVenu = Venu::LoadById($strName);
	
      
        if(!is_null($objVenu)){
        	return new MLCApiVenuObject($objVenu);
        }else{
            throw new MLCApiException("No Venu found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>