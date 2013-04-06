<?php
class MLCEntityModelStripeDataBase extends MLCEntityModelClassBase{
	protected $strClassName = 'StripeData';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objStripeData = new StripeData();
		}else{
        	$objStripeData = StripeData::LoadById($strName);
		}
      
        if(!is_null($objStripeData)){
        	return new MLCEntityModelStripeDataObject($objStripeData);
        }else{
            throw new MLCEntityModelException("No StripeData found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(StripeData::LoadAll()->GetCollection());
         $objResponse->BodyType = 'StripeData';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>