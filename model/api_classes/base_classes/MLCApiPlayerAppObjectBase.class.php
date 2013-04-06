<?php
class MLCApiPlayerAppObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'PlayerApp';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('Player'):
					//Load 
					$objPlayer = $this->GetEntity()->IdPlayer;
					return new MLCApiPlayerObject($objIdPlayer);
			    break;
			    
		       	case('ApiApplication'):
					//Load 
					$objApiApplication = $this->GetEntity()->IdApp;
					return new MLCApiApiApplicationObject($objIdApp);
			    break;
			    
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}