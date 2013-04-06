<?php
class MLCApiTeamObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'Team';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
		     	case('answers'):
		       		$arrAnswers = Answer::LoadCollByIdTeam($this->GetEntity()->idTeam)->GetCollection();
		       		return new MLCApiResponse($arrAnswers);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}