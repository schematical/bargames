<?php
class MLCEntityModelApiRequestTokenBase extends MLCEntityModelClassBase{
	protected $strClassName = 'ApiRequestToken';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objApiRequestToken = new ApiRequestToken();
		}else{
        	$objApiRequestToken = ApiRequestToken::LoadById($strName);
		}
      
        if(!is_null($objApiRequestToken)){
        	return new MLCEntityModelApiRequestTokenObject($objApiRequestToken);
        }else{
            throw new MLCEntityModelException("No ApiRequestToken found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(ApiRequestToken::LoadAll()->GetCollection());
         $objResponse->BodyType = 'ApiRequestToken';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>