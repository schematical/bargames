<?php
class MLCApiAnswerObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'Answer';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('Question'):
					//Load 
					$objQuestion = $this->GetEntity()->IdQuestion;
					return new MLCApiQuestionObject($objIdQuestion);
			    break;
			    
		       	case('Team'):
					//Load 
					$objTeam = $this->GetEntity()->IdTeam;
					return new MLCApiTeamObject($objIdTeam);
			    break;
			    
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}