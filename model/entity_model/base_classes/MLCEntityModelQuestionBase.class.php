<?php
class MLCEntityModelQuestionBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Question';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objQuestion = new Question();
		}else{
        	$objQuestion = Question::LoadById($strName);
		}
      
        if(!is_null($objQuestion)){
        	return new MLCEntityModelQuestionObject($objQuestion);
        }else{
            throw new MLCEntityModelException("No Question found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Question::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Question';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>