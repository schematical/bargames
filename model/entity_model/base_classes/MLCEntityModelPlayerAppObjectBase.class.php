<?php
class MLCEntityModelPlayerAppObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'PlayerApp';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('Player'):
				//Load 
				$objPlayer = $this->GetEntity()->IdPlayer;
				return new MLCEntityModelPlayerObject($objIdPlayer);
		    break;
		    
	       	case('ApiApplication'):
				//Load 
				$objApiApplication = $this->GetEntity()->IdApp;
				return new MLCEntityModelApiApplicationObject($objIdApp);
		    break;
		    
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}