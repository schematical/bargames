<?php
class MLCEntityModelAnswerBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Answer';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objAnswer = new Answer();
		}else{
        	$objAnswer = Answer::LoadById($strName);
		}
      
        if(!is_null($objAnswer)){
        	return new MLCEntityModelAnswerObject($objAnswer);
        }else{
            throw new MLCEntityModelException("No Answer found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Answer::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Answer';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>