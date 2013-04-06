<?php
class MLCEntityModelApiApplicationPermissionLevel_tpcdBase extends MLCEntityModelClassBase{
	protected $strClassName = 'ApiApplicationPermissionLevel_tpcd';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objApiApplicationPermissionLevel_tpcd = new ApiApplicationPermissionLevel_tpcd();
		}else{
        	$objApiApplicationPermissionLevel_tpcd = ApiApplicationPermissionLevel_tpcd::LoadById($strName);
		}
      
        if(!is_null($objApiApplicationPermissionLevel_tpcd)){
        	return new MLCEntityModelApiApplicationPermissionLevel_tpcdObject($objApiApplicationPermissionLevel_tpcd);
        }else{
            throw new MLCEntityModelException("No ApiApplicationPermissionLevel_tpcd found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(ApiApplicationPermissionLevel_tpcd::LoadAll()->GetCollection());
         $objResponse->BodyType = 'ApiApplicationPermissionLevel_tpcd';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>