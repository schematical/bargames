<?php
class MLCApiTrackingEventObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'TrackingEvent';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('AuthSession'):
					//Load 
					$objAuthSession = $this->GetEntity()->IdSession;
					return new MLCApiAuthSessionObject($objIdSession);
			    break;
			    
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}