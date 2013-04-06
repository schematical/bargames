<?php
class MLCEntityModelRoundObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'Round';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('Questions'):
	       		$arrQuestions = Question::LoadCollByIdRound($this->GetEntity()->idRound)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrQuestions);
	       		$objResponse->BodyType = 'Question';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}