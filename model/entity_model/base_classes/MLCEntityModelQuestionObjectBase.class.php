<?php
class MLCEntityModelQuestionObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'Question';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('Round'):
				//Load 
				$objRound = $this->GetEntity()->IdRound;
				return new MLCEntityModelRoundObject($objIdRound);
		    break;
		    
			
	     	case('Answers'):
	       		$arrAnswers = Answer::LoadCollByIdQuestion($this->GetEntity()->idQuestion)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrAnswers);
	       		$objResponse->BodyType = 'Answer';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}