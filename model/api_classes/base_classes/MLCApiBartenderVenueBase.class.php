<?php
class MLCApiBartenderVenueBase extends MLCApiClassBase{
	protected $strClassName = 'BartenderVenue';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
        $objBartenderVenue = BartenderVenue::LoadById($strName);
	
      
        if(!is_null($objBartenderVenue)){
        	return new MLCApiBartenderVenueObject($objBartenderVenue);
        }else{
            throw new MLCApiException("No BartenderVenue found with the data you submitted");
        }
        
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>