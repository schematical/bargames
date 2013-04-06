<?php
class MLCApiVenueObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'Venue';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
		     	case('bartendervenues'):
		       		$arrBartenderVenues = BartenderVenue::LoadCollByIdVenue($this->GetEntity()->idVenue)->GetCollection();
		       		return new MLCApiResponse($arrBartenderVenues);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}