<?php
class MLCApiRoundBase extends MLCApiClassBase{
	protected $strClassName = 'Round';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objRound = Round::LoadById($strName);
	
      
        if(!is_null($objRound)){
        	return new MLCApiRoundObject($objRound);
        }else{
            throw new MLCApiException("No Round found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>