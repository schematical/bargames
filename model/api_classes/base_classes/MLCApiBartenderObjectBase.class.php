<?php
class MLCApiBartenderObjectBase extends MLCApiObjectBase{
   
    protected $strClassName = 'Bartender';
	public function  __call($strName, $arrArguments) {
    		switch($strName){
				
				
		     	case('bartendervenues'):
		       		$arrBartenderVenues = BartenderVenue::LoadCollByIdBartender($this->GetEntity()->idBartender)->GetCollection();
		       		return new MLCApiResponse($arrBartenderVenues);
		    	break;
				
				default:
					return parent::__call($strName, $arrArguments);
				
    		}
	}
    
   
   
   	
}