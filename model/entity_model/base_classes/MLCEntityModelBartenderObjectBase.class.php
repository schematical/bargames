<?php
class MLCEntityModelBartenderObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'Bartender';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
			
	     	case('BartenderVenues'):
	       		$arrBartenderVenues = BartenderVenue::LoadCollByIdBartender($this->GetEntity()->idBartender)->GetCollection();
	       		$objResponse = new MLCEntityModelResponse($arrBartenderVenues);
	       		$objResponse->BodyType = 'BartenderVenue';
	       		return $objResponse;
	    	break;
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}