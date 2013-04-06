<?php
class MLCEntityModelLocationBase extends MLCEntityModelClassBase{
	protected $strClassName = 'Location';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objLocation = new Location();
		}else{
        	$objLocation = Location::LoadById($strName);
		}
      
        if(!is_null($objLocation)){
        	return new MLCEntityModelLocationObject($objLocation);
        }else{
            throw new MLCEntityModelException("No Location found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(Location::LoadAll()->GetCollection());
         $objResponse->BodyType = 'Location';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>