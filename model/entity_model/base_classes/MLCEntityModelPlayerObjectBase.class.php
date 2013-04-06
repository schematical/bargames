<?php
class MLCEntityModelPlayerObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'Player';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('PlayerApps'):
	       		$arrPlayerApps = PlayerApp::LoadCollByIdPlayer($this->GetEntity()->idPlayer)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrPlayerApps);
	       		$objResponse->BodyType = 'PlayerApp';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}