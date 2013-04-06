<?php
class MLCApiRoundObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'Round';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
		     	case('questions'):
		       		$arrQuestions = Question::LoadCollByIdRound($this->GetEntity()->idRound)->GetCollection();
		       		return new MLCApiResponse($arrQuestions);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}