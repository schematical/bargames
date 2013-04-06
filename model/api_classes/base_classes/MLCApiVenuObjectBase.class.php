<?php
class MLCApiVenuObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'Venu';
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