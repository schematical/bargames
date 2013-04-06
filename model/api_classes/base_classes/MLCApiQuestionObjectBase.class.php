<?php
class MLCApiQuestionObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'Question';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('Round'):
					//Load 
					$objRound = $this->GetEntity()->IdRound;
					return new MLCApiRoundObject($objIdRound);
			    break;
			    
				
		     	case('answers'):
		       		$arrAnswers = Answer::LoadCollByIdQuestion($this->GetEntity()->idQuestion)->GetCollection();
		       		return new MLCApiResponse($arrAnswers);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}