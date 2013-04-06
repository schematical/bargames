<?php
class MLCApiUserObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'User';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
		     	case('alerts'):
		       		$arrAlerts = Alert::LoadCollByIdUser($this->GetEntity()->idUser)->GetCollection();
		       		return new MLCApiResponse($arrAlerts);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}