<?php
class MLCApiPlayerObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'Player';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
		     	case('playerapps'):
		       		$arrPlayerApps = PlayerApp::LoadCollByIdPlayer($this->GetEntity()->idPlayer)->GetCollection();
		       		return new MLCApiResponse($arrPlayerApps);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}