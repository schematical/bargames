<?php
class MLCEntityModelBartenderVenueObjectBase extends MLCEntityModelObjectBase{
   
    protected $strClassName = 'BartenderVenue';
	public function  __call($strName, $arrArguments) {
		switch($strName){
			
	       	case('Venu'):
				//Load 
				$objVenu = $this->GetEntity()->IdVenue;
				return new MLCEntityModelVenuObject($objIdVenue);
		    break;
		    
	       	case('Bartender'):
				//Load 
				$objBartender = $this->GetEntity()->IdBartender;
				return new MLCEntityModelBartenderObject($objIdBartender);
		    break;
		    
			
			default:
				return parent::__call($strName, $arrArguments);
			
		}
	}
	
    
   
   
   	
}