<?php
class MLCApiVenueBase extends MLCApiClassBase{
	protected $strClassName = 'Venue';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objVenue = Venue::LoadById($strName);
	
      
        if(!is_null($objVenue)){
        	return new MLCApiVenueObject($objVenue);
        }else{
            throw new MLCApiException("No Venue found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>