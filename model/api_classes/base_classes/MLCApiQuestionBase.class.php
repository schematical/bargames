<?php
class MLCApiQuestionBase extends MLCApiClassBase{
	protected $strClassName = 'Question';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objQuestion = Question::LoadById($strName);
	
      
        if(!is_null($objQuestion)){
        	return new MLCApiQuestionObject($objQuestion);
        }else{
            throw new MLCApiException("No Question found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>