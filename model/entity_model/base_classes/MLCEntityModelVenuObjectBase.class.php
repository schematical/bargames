<?php
class MLCEntityModelVenuObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'Venu';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('BartenderVenues'):
	       		$arrBartenderVenues = BartenderVenue::LoadCollByIdVenue($this->GetEntity()->idVenue)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrBartenderVenues);
	       		$objResponse->BodyType = 'BartenderVenue';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}