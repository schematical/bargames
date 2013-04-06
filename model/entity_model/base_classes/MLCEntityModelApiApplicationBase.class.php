<?php
class MLCEntityModelApiApplicationBase extends MLCEntityModelClassBase{
	protected $strClassName = 'ApiApplication';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objApiApplication = new ApiApplication();
		}else{
        	$objApiApplication = ApiApplication::LoadById($strName);
		}
      
        if(!is_null($objApiApplication)){
        	return new MLCEntityModelApiApplicationObject($objApiApplication);
        }else{
            throw new MLCEntityModelException("No ApiApplication found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(ApiApplication::LoadAll()->GetCollection());
         $objResponse->BodyType = 'ApiApplication';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>