<?php
class MLCEntityModelApiCallBase extends MLCEntityModelClassBase{
	protected $strClassName = 'ApiCall';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objApiCall = new ApiCall();
		}else{
        	$objApiCall = ApiCall::LoadById($strName);
		}
      
        if(!is_null($objApiCall)){
        	return new MLCEntityModelApiCallObject($objApiCall);
        }else{
            throw new MLCEntityModelException("No ApiCall found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(ApiCall::LoadAll()->GetCollection());
         $objResponse->BodyType = 'ApiCall';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>