<?php
class MLCEntityModelAuthSessionObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'AuthSession';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('AuthUser'):
				//Load 
				$objAuthUser = $this->GetEntity()->IdUser;
				return new MLCEntityModelAuthUserObject($objIdUser);
		    break;
		    
			
	     	case('TrackingEvents'):
	       		$arrTrackingEvents = TrackingEvent::LoadCollByIdSession($this->GetEntity()->idSession)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrTrackingEvents);
	       		$objResponse->BodyType = 'TrackingEvent';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}