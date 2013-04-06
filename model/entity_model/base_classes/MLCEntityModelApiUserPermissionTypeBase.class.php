<?php
class MLCEntityModelApiUserPermissionTypeBase extends MLCEntityModelClassBase{
	protected $strClassName = 'ApiUserPermissionType';
	
	public function  __call($strName, $arrArguments) {
       
		$arrReturn = array();
		if($strName == 'new'){
			$objApiUserPermissionType = new ApiUserPermissionType();
		}else{
        	$objApiUserPermissionType = ApiUserPermissionType::LoadById($strName);
		}
      
        if(!is_null($objApiUserPermissionType)){
        	return new MLCEntityModelApiUserPermissionTypeObject($objApiUserPermissionType);
        }else{
            throw new MLCEntityModelException("No ApiUserPermissionType found with the data you submitted");
        }
        
     }
     public function FinalAction($arrPostData){
         $objResponse = new MLCEntityModelResponse(ApiUserPermissionType::LoadAll()->GetCollection());
         $objResponse->BodyType = 'ApiUserPermissionType';
		 return $objResponse;
     }

    	
	public function Query(){
	 	//Will need to accept QS Pramaeters of facebook, twitter, google
	}
}
?>