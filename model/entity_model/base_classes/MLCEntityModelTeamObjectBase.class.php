<?php
class MLCEntityModelTeamObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'Team';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('Answers'):
	       		$arrAnswers = Answer::LoadCollByIdTeam($this->GetEntity()->idTeam)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrAnswers);
	       		$objResponse->BodyType = 'Answer';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}