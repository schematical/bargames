<?php
class MLCEntityModelVenueBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Venue';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objVenue = new Venue();
		}else{
        	$objVenue = Venue::LoadById($strName);
		}
      
        if(!is_null($objVenue)){
        	return new MLCEntityModelVenueObject($objVenue);
        }else{
            throw new MLCEntityModelException("No Venue found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Venue::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Venue';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>