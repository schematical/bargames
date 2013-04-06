<?php
class MLCApiAnswerBase extends MLCApiClassBase{
	protected $strClassName = 'Answer';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objAnswer = Answer::LoadById($strName);
	
      
        if(!is_null($objAnswer)){
        	return new MLCApiAnswerObject($objAnswer);
        }else{
            throw new MLCApiException("No Answer found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>