<?php
class MLCEntityModelApiDeveloperBase extends MLCEntityModelClassBase{
	protected $strClassName = 'ApiDeveloper';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objApiDeveloper = new ApiDeveloper();
		}else{
        	$objApiDeveloper = ApiDeveloper::LoadById($strName);
		}
      
        if(!is_null($objApiDeveloper)){
        	return new MLCEntityModelApiDeveloperObject($objApiDeveloper);
        }else{
            throw new MLCEntityModelException("No ApiDeveloper found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(ApiDeveloper::LoadAll()->GetCollection());
         $objResponse->BodyType = 'ApiDeveloper';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>