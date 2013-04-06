<?php
class MLCEntityModelAnswerObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'Answer';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('Question'):
				//Load 
				$objQuestion = $this->GetEntity()->IdQuestion;
				return new MLCEntityModelQuestionObject($objIdQuestion);
		    break;
		    
	       	case('Team'):
				//Load 
				$objTeam = $this->GetEntity()->IdTeam;
				return new MLCEntityModelTeamObject($objIdTeam);
		    break;
		    
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}