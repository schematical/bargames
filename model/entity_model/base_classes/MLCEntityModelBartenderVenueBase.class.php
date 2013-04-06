<?php
class MLCEntityModelBartenderVenueBase extends MLCEntityModelClassBase{
	protected $strClassName = 'BartenderVenue';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objBartenderVenue = new BartenderVenue();
		}else{
        	$objBartenderVenue = BartenderVenue::LoadById($strName);
		}
      
        if(!is_null($objBartenderVenue)){
        	return new MLCEntityModelBartenderVenueObject($objBartenderVenue);
        }else{
            throw new MLCEntityModelException("No BartenderVenue found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(BartenderVenue::LoadAll()->GetCollection());
         $objResponse->BodyType = 'BartenderVenue';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>