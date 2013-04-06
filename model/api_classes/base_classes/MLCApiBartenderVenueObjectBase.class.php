<?php
class MLCApiBartenderVenueObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'BartenderVenue';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
		       	case('Venu'):
					//Load 
					$objVenu = $this->GetEntity()->IdVenue;
					return new MLCApiVenuObject($objIdVenue);
			    break;
			    
		       	case('Bartender'):
					//Load 
					$objBartender = $this->GetEntity()->IdBartender;
					return new MLCApiBartenderObject($objIdBartender);
			    break;
			    
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}