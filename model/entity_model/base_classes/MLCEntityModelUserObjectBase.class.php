<?php
class MLCEntityModelUserObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'User';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('Alerts'):
	       		$arrAlerts = Alert::LoadCollByIdUser($this->GetEntity()->idUser)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrAlerts);
	       		$objResponse->BodyType = 'Alert';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}